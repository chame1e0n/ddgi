<?php

namespace App\Http\Controllers\Product;

use App\AllProduct;
use App\AllProductInformation;
use App\AllProductsTermsTransh;
use App\Http\Controllers\Controller;
use App\Model\Borrower;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractLeasingAutocredit;
use App\Model\Employee;
use App\Model\Policy;
use App\Model\PolicyLeasingAutocredit;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Zaemshik;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class AvtocreditController
 * @package App\Http\Controllers\Product
 */
class AvtocreditController extends Controller
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

        $specification = Specification::where('key', '=', 'S_CCLI')->get()->first();

        $contract = new Contract();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_INDIVIDUAL;
        }
        if (isset($old_data['policies'])) {
            foreach ($old_data['policies'] as $item) {
                $policy = new Policy();
                $policy->policy_model = new PolicyLeasingAutocredit();

                $contract->policies[] = $policy;
            }
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('products.credit.avtocredit.form', [
            'block' => false,
            'borrower' => new Borrower(),
            'client' => new Client(),
            'contract' => $contract,
            'contract_leasing_autocredit' => new ContractLeasingAutocredit(),
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
            ContractLeasingAutocredit::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policies.*.franchise' => ['required', 'numeric', 'min:0'],

                'policies.*.policy_leasing_autocredit.issue_year' => 'required',
                'policies.*.policy_leasing_autocredit.brand' => 'required',
                'policies.*.policy_leasing_autocredit.model' => 'required',
                'policies.*.policy_leasing_autocredit.government_number' => 'required',
                'policies.*.policy_leasing_autocredit.techpassport_number' => 'required',
                'policies.*.policy_leasing_autocredit.engine_number' => 'required',
                'policies.*.policy_leasing_autocredit.carcase_number' => 'required',
                'policies.*.policy_leasing_autocredit.insurance_value' => ['required', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ae_additional_insured_sum' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ac_terrorist_attack_for_car' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ac_terrorist_attack_for_human' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ac_terrorist_attack_evacuation' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_vehicle_death_recovery_sum' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_vehicle_death_recovery_premium' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_vehicle_death_recovery_franchise' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_civil_liability_sum' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_civil_liability_premium' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_driver_sum_for_person' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_driver_premium' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_passenger_sum_for_person' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_passenger_premium' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_general_limit_sum_for_person' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_general_limit_premium' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_general_limit_responsibility' => ['nullable', 'numeric', 'min:0'],

                'tranches.*.sum' => ['required', 'numeric', 'min:0'],
                'tranches.*.from' => 'required',
            ]
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

        $borrower = Borrower::create($request['borrower']);
        $client = Client::create($request['client']);
        $contract_leasing_autocredit = ContractLeasingAutocredit::create($request['contract_leasing_autocredit']);

        $contract_data = $request['contract'];
        $contract_data['borrower_id'] = $borrower->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractLeasingAutocredit::class;
        $contract_data['model_id'] = $contract_leasing_autocredit->id;

        $contract = Contract::create($contract_data);

        foreach($policies_data as $policy_data) {
            $policy = Policy::where('name', '=', $policy_data['name'])
                            ->where('series', '=', $policy_data['series'])
                            ->get()
                            ->first();

            if ($policy) {
                $policy_leasing_autocredit = PolicyLeasingAutocredit::create($policy_data['policy_leasing_autocredit']);

                unset($policy_data['policy_leasing_autocredit']);

                $policy_data['contract_id'] = $contract->id;
                $policy_data['model_type'] = PolicyLeasingAutocredit::class;
                $policy_data['model_id'] = $policy_leasing_autocredit->id;

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
     * @param  \App\Model\Contract $avtocredit
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $avtocredit)
    {
        $contract = $avtocredit;

        return view('products.credit.avtocredit.form', [
            'block' => true,
            'borrower' => $contract->borrower,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_leasing_autocredit' => $contract->contract_model,
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $avtocredit
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $avtocredit)
    {
        $contract = $avtocredit;

        return view('products.credit.avtocredit.form', [
            'block' => false,
            'borrower' => $contract->borrower,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_leasing_autocredit' => $contract->contract_model,
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $avtocredit
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $avtocredit)
    {
        $request->validate(array_merge(
            Borrower::$validate,
            Client::$validate,
            Contract::$validate,
            ContractLeasingAutocredit::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policies.*.franchise' => ['required', 'numeric', 'min:0'],

                'policies.*.policy_leasing_autocredit.issue_year' => 'required',
                'policies.*.policy_leasing_autocredit.brand' => 'required',
                'policies.*.policy_leasing_autocredit.model' => 'required',
                'policies.*.policy_leasing_autocredit.government_number' => 'required',
                'policies.*.policy_leasing_autocredit.techpassport_number' => 'required',
                'policies.*.policy_leasing_autocredit.engine_number' => 'required',
                'policies.*.policy_leasing_autocredit.carcase_number' => 'required',
                'policies.*.policy_leasing_autocredit.insurance_value' => ['required', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ae_additional_insured_sum' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ac_terrorist_attack_for_car' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ac_terrorist_attack_for_human' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ac_terrorist_attack_evacuation' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_vehicle_death_recovery_sum' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_vehicle_death_recovery_premium' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_vehicle_death_recovery_franchise' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_civil_liability_sum' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_civil_liability_premium' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_driver_sum_for_person' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_driver_premium' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_passenger_sum_for_person' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_passenger_premium' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_general_limit_sum_for_person' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_general_limit_premium' => ['nullable', 'numeric', 'min:0'],
                'policies.*.policy_leasing_autocredit.ec_general_limit_responsibility' => ['nullable', 'numeric', 'min:0'],

                'tranches.*.sum' => ['required', 'numeric', 'min:0'],
                'tranches.*.from' => 'required',
            ]
        ));

        $contract = $avtocredit;

        $borrower = $contract->borrower;
        $borrower->fill($request['borrower']);
        $borrower->save();

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_leasing_autocredit = $contract->contract_model;
        $contract_leasing_autocredit->fill($request['contract_leasing_autocredit']);
        $contract_leasing_autocredit->save();

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
                    $policy_leasing_autocredit = $policy->policy_model;
                    $policy_leasing_autocredit->fill($policy_data['policy_leasing_autocredit']);
                    $policy_leasing_autocredit->save();

                    unset($policy_data['policy_leasing_autocredit']);

                    $policy->fill($policy_data);
                    $policy->save();
                } else {
                    $policy = Policy::where('name', '=', $policy_data['name'])
                                    ->where('series', '=', $policy_data['series'])
                                    ->get()
                                    ->first();

                    if ($policy) {
                        $policy_leasing_autocredit = PolicyLeasingAutocredit::create($policy_data['policy_leasing_autocredit']);

                        unset($policy_data['policy_leasing_autocredit']);

                        $policy_data['contract_id'] = $contract->id;
                        $policy_data['model_type'] = PolicyLeasingAutocredit::class;
                        $policy_data['model_id'] = $policy_leasing_autocredit->id;

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
     * @param  \App\Model\Contract $avtocredit
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $avtocredit)
    {
        $contract = $avtocredit;

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
