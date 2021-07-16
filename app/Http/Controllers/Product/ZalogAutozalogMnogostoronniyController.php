<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ZalogAutozalogMnogostoronniyRequest;
use App\Model\Beneficiary;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractMultilateralCarDeposit;
use App\Model\Employee;
use App\Model\Pledger;
use App\Model\Policy;
use App\Model\PolicyMultilateralCarDeposit;
use App\Model\Specification;
use App\Models\Allproduct;
use App\Models\AllProductImushestvoInfo;
use App\Models\AllProductInformation;
use App\Models\AllProductsTermsTranshes;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use App\Models\Zalogodatel;
use Illuminate\Http\Request;

class ZalogAutozalogMnogostoronniyController extends Controller
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

        $specification = Specification::where('key', '=', 'S_PVI')->get()->first();

        $contract = new Contract();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_INDIVIDUAL;
        }
        if (isset($old_data['policies'])) {
            foreach ($old_data['policies'] as $item) {
                $policy = new Policy();
                $policy->policy_model = new PolicyMultilateralCarDeposit();

                $contract->policies[] = $policy;
            }
        }

        return view('products.zalog.autozalog-mnogostoronniy.form', [
            'beneficiary' => new Beneficiary(),
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'pledger' => new Pledger(),
            'contract_multilateral_car_deposit' => new ContractMultilateralCarDeposit(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZalogAutozalogMnogostoronniyRequest $request)
    {
        $newPolicyHolders           = PolicyHolder::createPolicyHolders($request);
        if(!$newPolicyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
        $newPolicyBeneficiaries     = PolicyBeneficiaries::createPolicyBeneficiaries($request);
        if(!$newPolicyBeneficiaries)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newPolicyBeneficiaries')]);

        $newZalogodatel     = Zalogodatel::createZalogodatel($request);
        if(!$newZalogodatel)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newPolicyBeneficiaries')]);

        $newProduct = Allproduct::createAllProduct($request,$newPolicyHolders->id, $newPolicyBeneficiaries->id, $newZalogodatel->id);

        AllProductsTermsTranshes::create($newProduct->id, $request);
        AllProductInformation::create($newProduct->id, $request);
        if(!$newProduct)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newProduct')]);


        return redirect()->route('zalog-autozalog-mnogostoronniy.edit', $newProduct->id)->withInput()->with([sprintf('Данные успешно добавлены')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Allproduct::with('policyHolders', 'policyBeneficiaries', 'informations', 'strahPremiya', 'zalogodatel')->find($id);

        $banks = Bank::all();
        $agents = Agent::all();
        $policySeries = PolicySeries::all();
        return view('products.zalog.autozalog-mnogostoronniy.show', compact('banks', 'agents', 'page', 'policySeries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Allproduct::with('policyHolders', 'policyBeneficiaries', 'informations', 'strahPremiya', 'zalogodatel')->find($id);

        $banks = Bank::all();
        $agents = Agent::all();
        $policySeries = PolicySeries::all();
        return view('products.zalog.autozalog-mnogostoronniy.edit', compact('banks', 'agents', 'page', 'policySeries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ZalogAutozalogMnogostoronniyRequest $request, $id)
    {
        $product = Allproduct::findOrFail($id);
        $policyHolders = PolicyHolder::updatePolicyHolders($product->policy_holder_id, $request);
        if (!$policyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при обновлении PolicyHolders')]);
        $policyBeneficiaries = PolicyBeneficiaries::updatePolicyBeneficiaries($product->policy_beneficiaries_id, $request);
        if (!$policyBeneficiaries)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newPolicyBeneficiaries')]);

        $zalogodatel = Zalogodatel::updateZalogodatel($product->zalogodatel_id, $request);
        if (!$zalogodatel)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $zalogodatel')]);

        $product = Allproduct::updateAllProduct($id, $request);

        if (!$product)
            return back()->withInput()->withErrors([sprintf('Ошибка при обновлении $product')]);

        AllProductsTermsTranshes::updateTermsTranshes($product, $request);
        AllProductInformation::updateInfo($product, $request);

        return back()->withInput()->with([sprintf('Данные успешно обновлены')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
