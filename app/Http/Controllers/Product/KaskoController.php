<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\KascoRequest;
use App\Model\Beneficiary;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractCasco;
use App\Model\Employee;
use App\Model\Policy;
use App\Model\PolicyCasco;
use App\Model\Specification;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Product\KascoStrahPremiya;
use App\Models\Product\KaskoModel;
use App\Models\Product\KaskoPolicyInformationModel;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KaskoController extends Controller
{
    /**
     * Display a list of all contracts.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return redirect()->route('contracts.index');
    }

    /**
     * Show a form to create a new contract.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $old_data = old();

        $specification = Specification::where('key', '=', 'S_VVI')->get()->first();

        $contract = new Contract();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_INDIVIDUAL;
        }
        if (isset($old_data['policies'])) {
            foreach ($old_data['policies'] as $item) {
                $policy = new Policy();
                $policy->policy_model = new PolicyCasco();

                $contract->policies[] = $policy;
            }
        }

        return view('products.kasko.form', [
            'beneficiary' => new Beneficiary(),
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_casco' => new ContractCasco(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(KascoRequest $request)
    {

        $policyHolder = PolicyHolder::createPolicyHolders($request);
        $policyBeneficiaries = PolicyBeneficiaries::createPolicyBeneficiaries($request);
        $kasko = KaskoModel::createKasko($request, $policyHolder->id, $policyBeneficiaries->id);
        KaskoPolicyInformationModel::createPolicyInfo($request, $kasko->id);
        KascoStrahPremiya::createStrahPremiya($request, $kasko->id);

        return redirect(route('kasco-add.edit', $kasko->id));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $page = KaskoModel::with('PolicyBeneficiaries','policyHolders', 'policyInformations', 'KascoStrahPremiya')->find($id);
        $agents = Agent::getActiveAgent();
        $banks = Bank::getBanks();
        $policySeries =  PolicySeries::get();
        return view('products.kasko.show', compact('page', 'agents', 'banks', 'policySeries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $agents = Agent::getActiveAgent();
        $banks = Bank::getBanks();
        $policySeries = PolicySeries::get();
        $page = KaskoModel::with('PolicyBeneficiaries', 'policyHolders', 'policyInformations', 'KascoStrahPremiya')->find($id);
        return view('products.kasko.edit', compact('agents', 'banks', 'policySeries', 'page'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(KascoRequest $request, $id)
    {
        $policyHolder        = PolicyHolder::updatePolicyHolders($id, $request);
        $policyBeneficiaries = PolicyBeneficiaries::updatePolicyBeneficiaries($id,$request);
        $kasko               = KaskoModel::updateKasco($request, $policyHolder->id,$policyBeneficiaries->id, $id);
                               KaskoPolicyInformationModel::updateePolicyInfo($request,$kasko);
                               KascoStrahPremiya::updateStrahPremiya($request,$kasko);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
