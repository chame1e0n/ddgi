<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreditNepogashenRequest;
use App\Model\Borrower;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractCreditLeasingRepayment;
use App\Model\Employee;
use App\Model\Policy;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PolicyHolder;
use App\Models\Product\CreditNepogashen;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Zaemshik;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CreditNepogashenController extends Controller
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

        $specification = Specification::where('key', '=', 'S_LDRIL')->get()->first();

        $contract = new Contract();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_LEGAL;
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('products.credit.nepogashen.form', [
            'block' => false,
            'borrower' => new Borrower(),
            'client' => new Client(),
            'contract' => $contract,
            'contract_credit_leasing_repayment' => new ContractCreditLeasingRepayment(),
            'policy' => new Policy(),
        ]);
    }

    /**
     * Store a new contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(array_merge(
            Borrower::$validate,
            Client::$validate,
            Contract::$validate,
            ContractCreditLeasingRepayment::$validate,
            [
                'policy.name' => 'required',
                'policy.series' => 'required',
                'policy.date_of_issue' => 'required',
                'policy.polis_from_date' => 'required',
                'policy.polis_to_date' => 'required',
                'policy.insurance_sum' => 'required',
                'policy.franchise' => 'required',

                'tranches.*.sum' => 'required',
                'tranches.*.from' => 'required',
            ]
        ));

        $policy_data = $request['policy'];

        $policy = Policy::where('name', '=', $policy_data['name'])
                        ->where('series', '=', $policy_data['series'])
                        ->get()
                        ->first();

        if (!$policy) {
            return back()->withErrors([
                sprintf(
                    'В базе не обнаружен полис с %s именованием и с %s серией',
                    $policy_data['name'],
                    $policy_data['series']
                )
            ]);
        }

        $borrower = Borrower::create($request['borrower']);
        $client = Client::create($request['client']);
        $contract_credit_leasing_repayment = ContractCreditLeasingRepayment::create($request['contract_credit_leasing_repayment']);

        $contract_data = $request['contract'];
        $contract_data['borrower_id'] = $borrower->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractCreditLeasingRepayment::class;
        $contract_data['model_id'] = $contract_credit_leasing_repayment->id;

        $contract = Contract::create($contract_data);

        $policy_data['contract_id'] = $contract->id;

        $policy->fill($policy_data);
        $policy->save();

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $contract_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file) {
                $contract_files[] = [
                    'type' => $type,
                    'original_name' => $file->getClientOriginalName(),
                    'path' => Storage::putFile('public/contract', $file),
                ];
            }
        }

        $contract->files()->createMany($contract_files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено сохранение контракта');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $credit_nepogashen
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $credit_nepogashen)
    {
        $contract = $credit_nepogashen;

        return view('products.credit.nepogashen.form', [
            'block' => true,
            'borrower' => $contract->borrower,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_credit_leasing_repayment' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $credit_nepogashen
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $credit_nepogashen)
    {
        $contract = $credit_nepogashen;

        return view('products.credit.nepogashen.form', [
            'block' => false,
            'borrower' => $contract->borrower,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_credit_leasing_repayment' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $credit_nepogashen
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $credit_nepogashen)
    {
        $request->validate(array_merge(
            Borrower::$validate,
            Client::$validate,
            Contract::$validate,
            ContractCreditLeasingRepayment::$validate,
            [
                'policy.name' => 'required',
                'policy.series' => 'required',
                'policy.date_of_issue' => 'required',
                'policy.polis_from_date' => 'required',
                'policy.polis_to_date' => 'required',
                'policy.insurance_sum' => 'required',
                'policy.franchise' => 'required',

                'tranches.*.sum' => 'required',
                'tranches.*.from' => 'required',
            ]
        ));

        $contract = $credit_nepogashen;

        $borrower = $contract->borrower;
        $borrower->fill($request['borrower']);
        $borrower->save();

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_credit_leasing_repayment = $contract->contract_model;
        $contract_credit_leasing_repayment->fill($request['contract_credit_leasing_repayment']);
        $contract_credit_leasing_repayment->save();

        $contract->fill($request['contract']);
        $contract->save();

        $policy = $contract->policies->first();
        $policy->fill($request['policy']);
        $policy->save();

        if ($request['tranches']) {
            $tranche_ids = [];

            foreach($request['tranches'] as $tranche_data) {
                $tranche = Tranche::where('contract_id', '=', $contract->id)
                                  ->where('from', '=', $tranche_data['from'])
                                  ->get()
                                  ->first();

                if ($tranche) {
                    if ($tranche->sum != $tranche_data['sum']) {
                        $tranche->sum = $tranche_data['sum'];
                        $tranche->save();
                    }
                } else {
                    $tranche = $contract->tranches()->create($tranche_data);
                }

                $tranche_ids[] = $tranche->id;
            }

            Tranche::where('contract_id', '=', $contract->id)
                   ->whereNotIn('id', $tranche_ids)
                   ->delete();
        }

        $contract_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file) {
                if ($old_file = $contract->getFile($type)) {
                    $old_file->delete();
                }

                $contract_files[] = [
                    'type' => $type,
                    'original_name' => $file->getClientOriginalName(),
                    'path' => Storage::putFile('public/contract', $file),
                ];
            }
        }

        $contract->files()->createMany($contract_files);

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено изменение контракта');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $credit_nepogashen
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $credit_nepogashen)
    {
        $contract = $credit_nepogashen;

        if ($policy = $contract->policies->first()) {
            $policy->delete();
        }
        $contract->delete();

        return redirect()->route('contracts.index')
                         ->with('success', sprintf('Данные о контракте \'%s\' были успешно удалены', $contract->number));
    }
}
