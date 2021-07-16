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
use App\Model\Tranche;
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

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
            'contract_multilateral_car_deposit' => new ContractMultilateralCarDeposit(),
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
            ContractMultilateralCarDeposit::$validate,
            Pledger::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.insurance_sum' => 'required',
                'policies.*.franchise' => 'required',

                'policies.*.policy_multilateral_car_deposit.issue_year' => 'required',
                'policies.*.policy_multilateral_car_deposit.brand' => 'required',
                'policies.*.policy_multilateral_car_deposit.model' => 'required',
                'policies.*.policy_multilateral_car_deposit.government_number' => 'required',
                'policies.*.policy_multilateral_car_deposit.techpassport_number' => 'required',
                'policies.*.policy_multilateral_car_deposit.modification' => 'required',
                'policies.*.policy_multilateral_car_deposit.engine_number' => 'required',
                'policies.*.policy_multilateral_car_deposit.carcase_number' => 'required',
                'policies.*.policy_multilateral_car_deposit.carrying_capacity' => 'required',
                'policies.*.policy_multilateral_car_deposit.insurance_value' => 'required',
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

        $beneficiary = Beneficiary::create($request['beneficiary']);
        $client = Client::create($request['client']);
        $pledger = Pledger::create($request['pledger']);
        $contract_multilateral_car_deposit = ContractMultilateralCarDeposit::create($request['contract_multilateral_car_deposit']);

        $contract_data = $request['contract'];
        $contract_data['beneficiary_id'] = $beneficiary->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['pledger_id'] = $pledger->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractMultilateralCarDeposit::class;
        $contract_data['model_id'] = $contract_multilateral_car_deposit->id;

        $contract = Contract::create($contract_data);

        foreach($policies_data as $policy_data) {
            $policy = Policy::where('name', '=', $policy_data['name'])
                            ->where('series', '=', $policy_data['series'])
                            ->get()
                            ->first();

            if ($policy) {
                $policy_multilateral_car_deposit = PolicyMultilateralCarDeposit::create($policy_data['policy_multilateral_car_deposit']);

                unset($policy_data['policy_multilateral_car_deposit']);

                $policy_data['contract_id'] = $contract->id;
                $policy_data['model_type'] = PolicyMultilateralCarDeposit::class;
                $policy_data['model_id'] = $policy_multilateral_car_deposit->id;

                $policy->fill($policy_data);
                $policy->save();
            }
        }

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $contract_files = [];
        $contract_multilateral_car_deposit_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file) {
                if ($type == ContractMultilateralCarDeposit::FILE_OVERVIEW_PHOTO) {
                    $contract_multilateral_car_deposit_files[] = [
                        'type' => $type,
                        'original_name' => $file->getClientOriginalName(),
                        'path' => Storage::putFile('public/contract_multilateral_car_deposit', $file),
                    ];
                } else {
                    $contract_files[] = [
                        'type' => $type,
                        'original_name' => $file->getClientOriginalName(),
                        'path' => Storage::putFile('public/contract', $file),
                    ];
                }
            }
        }

        $contract->files()->createMany($contract_files);
        $contract_multilateral_car_deposit->files()->createMany($contract_multilateral_car_deposit_files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено сохранение контракта');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $zalog_autozalog_mnogostoronniy
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $zalog_autozalog_mnogostoronniy)
    {
        $contract = $zalog_autozalog_mnogostoronniy;

        return view('products.zalog.autozalog-mnogostoronniy.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_multilateral_car_deposit' => $contract->contract_model,
            'pledger' => $contract->pledger,
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $zalog_autozalog_mnogostoronniy
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $zalog_autozalog_mnogostoronniy)
    {
        $contract = $zalog_autozalog_mnogostoronniy;

        return view('products.zalog.autozalog-mnogostoronniy.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_multilateral_car_deposit' => $contract->contract_model,
            'pledger' => $contract->pledger,
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $zalog_autozalog_mnogostoronniy
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $zalog_autozalog_mnogostoronniy)
    {
        $request->validate(array_merge(
            Beneficiary::$validate,
            Client::$validate,
            Contract::$validate,
            ContractMultilateralCarDeposit::$validate,
            Pledger::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.insurance_sum' => 'required',
                'policies.*.franchise' => 'required',

                'policies.*.policy_multilateral_car_deposit.issue_year' => 'required',
                'policies.*.policy_multilateral_car_deposit.brand' => 'required',
                'policies.*.policy_multilateral_car_deposit.model' => 'required',
                'policies.*.policy_multilateral_car_deposit.government_number' => 'required',
                'policies.*.policy_multilateral_car_deposit.techpassport_number' => 'required',
                'policies.*.policy_multilateral_car_deposit.modification' => 'required',
                'policies.*.policy_multilateral_car_deposit.engine_number' => 'required',
                'policies.*.policy_multilateral_car_deposit.carcase_number' => 'required',
                'policies.*.policy_multilateral_car_deposit.carrying_capacity' => 'required',
                'policies.*.policy_multilateral_car_deposit.insurance_value' => 'required',
            ]
        ));

        $contract = $zalog_autozalog_mnogostoronniy;

        $beneficiary = $contract->beneficiary;
        $beneficiary->fill($request['beneficiary']);
        $beneficiary->save();

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $pledger = $contract->pledger;
        $pledger->fill($request['pledger']);
        $pledger->save();

        $contract_multilateral_car_deposit = $contract->contract_model;
        $contract_multilateral_car_deposit->fill($request['contract_multilateral_car_deposit']);
        $contract_multilateral_car_deposit->save();

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
                    $policy_multilateral_car_deposit = $policy->policy_model;
                    $policy_multilateral_car_deposit->fill($policy_data['policy_multilateral_car_deposit']);
                    $policy_multilateral_car_deposit->save();

                    unset($policy_data['policy_multilateral_car_deposit']);

                    $policy->fill($policy_data);
                    $policy->save();
                } else {
                    $policy = Policy::where('name', '=', $policy_data['name'])
                                    ->where('series', '=', $policy_data['series'])
                                    ->get()
                                    ->first();

                    if ($policy) {
                        $policy_multilateral_car_deposit = PolicyMultilateralCarDeposit::create($policy_data['policy_multilateral_car_deposit']);

                        unset($policy_data['policy_multilateral_car_deposit']);

                        $policy_data['contract_id'] = $contract->id;
                        $policy_data['model_type'] = PolicyMultilateralCarDeposit::class;
                        $policy_data['model_id'] = $policy_multilateral_car_deposit->id;

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
        $contract_multilateral_car_deposit_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file) {
                if ($type == ContractMultilateralCarDeposit::FILE_OVERVIEW_PHOTO) {         // TODO: упростить логику
                    if ($old_file = $contract_multilateral_car_deposit->getFile($type)) {
                        $old_file->delete();
                    }

                    $contract_multilateral_car_deposit_files[] = [
                        'type' => $type,
                        'original_name' => $file->getClientOriginalName(),
                        'path' => Storage::putFile('public/contract_multilateral_car_deposit', $file),
                    ];
                } else {
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
        }

        $contract->files()->createMany($contract_files);
        $contract_multilateral_car_deposit->files()->createMany($contract_multilateral_car_deposit_files);

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено изменение контракта');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $zalog_autozalog_mnogostoronniy
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $zalog_autozalog_mnogostoronniy)
    {
        $contract = $zalog_autozalog_mnogostoronniy;

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
