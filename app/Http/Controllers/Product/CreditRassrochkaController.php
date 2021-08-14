<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Model\Beneficiary;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractInstallment;
use App\Model\Pledger;
use App\Model\Policy;
use App\Model\PolicyInstallment;
use App\Model\Specification;
use App\Model\Tranche;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CreditRassrochkaController extends Controller
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

        $specification = Specification::where('key', '=', 'S_CECI')->get()->first();

        $contract = new Contract();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_INDIVIDUAL;
        }
        if (isset($old_data['policies'])) {
            foreach ($old_data['policies'] as $item) {
                $policy = new Policy();
                $policy->policy_model = new PolicyInstallment();

                $contract->policies[] = $policy;
            }
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('products.credit.rassrochka.form', [
            'beneficiary' => new Beneficiary(),
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_installment' => new ContractInstallment(),
            'pledger' => new Pledger(),
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
            Beneficiary::$validate,
            Client::$validate,
            Contract::$validate,
            ContractInstallment::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.insurance_sum' => 'required',
                'policies.*.franchise' => 'required',

                'policies.*.policy_installment.issue_year' => 'required',
                'policies.*.policy_installment.brand' => 'required',
                'policies.*.policy_installment.model' => 'required',
                'policies.*.policy_installment.government_number' => 'required',
                'policies.*.policy_installment.techpassport_number' => 'required',
                'policies.*.policy_installment.engine_number' => 'required',
                'policies.*.policy_installment.carcase_number' => 'required',
                'policies.*.policy_installment.insurance_value' => 'required',

                'tranches.*.sum' => 'required',
                'tranches.*.from' => 'required',
            ],
            Pledger::$validate,
        ));

        $policies_data = $request['policies'];

        $query = Policy::query();
        if ($policies_data) {
            foreach($policies_data as $policies_item) {
                $query->orWhere(function (Builder $sub_query) use ($policies_item) {
                    $sub_query->where('name', '=', $policies_item['name'])
                              ->where('series', '=', $policies_item['series']);
                });
            }
        }

        if (empty($policies_data) || $query->count() == 0) {
            return back()->withErrors('В базе не обнаружен ни один полис с указанными именованием и серией');
        }

        $beneficiary = Beneficiary::create($request['beneficiary']);
        $client = Client::create($request['client']);
        $pledger = Pledger::create($request['pledger']);
        $contract_installment = ContractInstallment::create($request['contract_installment']);

        $contract_data = $request['contract'];
        $contract_data['beneficiary_id'] = $beneficiary->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['pledger_id'] = $pledger->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractInstallment::class;
        $contract_data['model_id'] = $contract_installment->id;

        $contract = Contract::create($contract_data);

        foreach($policies_data as $policy_data) {
            $policy = Policy::where('name', '=', $policy_data['name'])
                            ->where('series', '=', $policy_data['series'])
                            ->get()
                            ->first();

            if ($policy) {
                $policy_installment = PolicyInstallment::create($policy_data['policy_installment']);

                unset($policy_data['policy_installment']);

                $policy_data['contract_id'] = $contract->id;
                $policy_data['model_type'] = PolicyInstallment::class;
                $policy_data['model_id'] = $policy_installment->id;

                $policy->fill($policy_data);
                $policy->save();
            }
        }

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
     * @param  \App\Model\Contract $rassrochka
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $rassrochka)
    {
        $contract = $rassrochka;

        return view('products.credit.rassrochka.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_installment' => $contract->contract_model,
            'pledger' => $contract->pledger,
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $rassrochka
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $rassrochka)
    {
        $contract = $rassrochka;

        return view('products.credit.rassrochka.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_installment' => $contract->contract_model,
            'pledger' => $contract->pledger,
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $rassrochka
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $rassrochka)
    {
        $request->validate(array_merge(
            Beneficiary::$validate,
            Client::$validate,
            Contract::$validate,
            ContractInstallment::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.insurance_sum' => 'required',
                'policies.*.franchise' => 'required',

                'policies.*.policy_installment.issue_year' => 'required',
                'policies.*.policy_installment.brand' => 'required',
                'policies.*.policy_installment.model' => 'required',
                'policies.*.policy_installment.government_number' => 'required',
                'policies.*.policy_installment.techpassport_number' => 'required',
                'policies.*.policy_installment.engine_number' => 'required',
                'policies.*.policy_installment.carcase_number' => 'required',
                'policies.*.policy_installment.insurance_value' => 'required',

                'tranches.*.sum' => 'required',
                'tranches.*.from' => 'required',
            ],
            Pledger::$validate,
        ));

        $contract = $rassrochka;

        $beneficiary = $contract->beneficiary;
        $beneficiary->fill($request['beneficiary']);
        $beneficiary->save();

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $pledger = $contract->pledger;
        $pledger->fill($request['pledger']);
        $pledger->save();

        $contract_installment = $contract->contract_model;
        $contract_installment->fill($request['contract_installment']);
        $contract_installment->save();

        $contract->fill($request['contract']);
        $contract->save();

        if ($request['policies']) {
            $policies_ids = [];

            foreach($request['policies'] as $policy_data) {
                $policy = Policy::where('contract_id', '=', $contract->id)
                                ->where('name', '=', $policy_data['name'])
                                ->where('series', '=', $policy_data['series'])
                                ->get()
                                ->first();

                if ($policy) {
                    $policy_installment = $policy->policy_model;
                    $policy_installment->fill($policy_data['policy_installment']);
                    $policy_installment->save();

                    unset($policy_data['policy_installment']);

                    $policy->fill($policy_data);
                    $policy->save();
                } else {
                    $policy = Policy::where('name', '=', $policy_data['name'])
                                    ->where('series', '=', $policy_data['series'])
                                    ->get()
                                    ->first();

                    if ($policy) {
                        $policy_installment = PolicyInstallment::create($policy_data['policy_installment']);

                        unset($policy_data['policy_installment']);

                        $policy_data['contract_id'] = $contract->id;
                        $policy_data['model_type'] = PolicyInstallment::class;
                        $policy_data['model_id'] = $policy_installment->id;

                        $policy->fill($policy_data);
                        $policy->save();
                    }
                }

                $policies_ids[] = $policy->id;
            }

            $policies = Policy::where('contract_id', '=', $contract->id)
                              ->whereNotIn('id', $policies_ids)
                              ->get();
            foreach($policies as /* @var $policy Policy */ $policy) {
                $policy->delete();
            }
        }

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
     * @param  \App\Model\Contract $rassrochka
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $rassrochka)
    {
        $contract = $rassrochka;

        if ($policies = $contract->policies) {
            foreach($policies as /* @var $policy Policy */ $policy) {
                $policy->delete();
            }
        }
        $contract->delete();

        return redirect()->route('contracts.index')
                         ->with('success', sprintf('Данные о контракте \'%s\' были успешно удалены', $contract->number));
    }
}
