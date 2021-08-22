<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\AutoZalog3xRequest;
use App\Model\Bank;
use App\Model\Beneficiary;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractTrilateralCarDeposit;
use App\Model\Employee;
use App\Model\Pledger;
use App\Model\Policy;
use App\Model\PolicyTrilateralCarDeposit;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\Allproduct;
use App\Models\AllProductInformation;
use App\Models\AllProductsTermsTranshes;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AutoZalog3xController extends Controller
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

        $specification = Specification::where('key', '=', 'S_IOTVBP')->get()->first();

        $contract = new Contract();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = request('type', Contract::TYPE_INDIVIDUAL);
        }
        if (isset($old_data['policies'])) {
            foreach ($old_data['policies'] as $item) {
                $policy = new Policy();
                $policy->policy_model = new PolicyTrilateralCarDeposit();

                $contract->policies[] = $policy;
            }
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('products.zalog.autozalog3x.form', [
            'beneficiary' => new Beneficiary(),
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_trilateral_car_deposit' => new ContractTrilateralCarDeposit(),
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
            ContractTrilateralCarDeposit::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policies.*.franchise' => ['required', 'numeric', 'min:0'],

                'policies.*.policy_trilateral_car_deposit.issue_year' => 'required',
                'policies.*.policy_trilateral_car_deposit.brand' => 'required',
                'policies.*.policy_trilateral_car_deposit.model' => 'required',
                'policies.*.policy_trilateral_car_deposit.government_number' => 'required',
                'policies.*.policy_trilateral_car_deposit.techpassport_number' => 'required',
                'policies.*.policy_trilateral_car_deposit.modification' => 'required',
                'policies.*.policy_trilateral_car_deposit.engine_number' => 'required',
                'policies.*.policy_trilateral_car_deposit.carcase_number' => 'required',
                'policies.*.policy_trilateral_car_deposit.carrying_capacity' => 'required',
                'policies.*.policy_trilateral_car_deposit.insurance_value' => ['required', 'numeric', 'min:0'],

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

        $beneficiary = Beneficiary::create($request['beneficiary']);
        $client = Client::create($request['client']);
        $contract_trilateral_car_deposit = ContractTrilateralCarDeposit::create($request['contract_trilateral_car_deposit']);

        $contract_data = $request['contract'];
        $contract_data['beneficiary_id'] = $beneficiary->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractTrilateralCarDeposit::class;
        $contract_data['model_id'] = $contract_trilateral_car_deposit->id;

        $contract = Contract::create($contract_data);

        foreach($policies_data as $policy_data) {
            $policy = Policy::where('name', '=', $policy_data['name'])
                            ->where('series', '=', $policy_data['series'])
                            ->get()
                            ->first();

            if ($policy) {
                $policy_trilateral_car_deposit = PolicyTrilateralCarDeposit::create($policy_data['policy_trilateral_car_deposit']);

                unset($policy_data['policy_trilateral_car_deposit']);

                $policy_data['contract_id'] = $contract->id;
                $policy_data['model_type'] = PolicyTrilateralCarDeposit::class;
                $policy_data['model_id'] = $policy_trilateral_car_deposit->id;

                $policy->fill($policy_data);
                $policy->save();
            }
        }

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $contract_files = [];
        $contract_trilateral_car_deposit_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file) {
                if ($type == ContractTrilateralCarDeposit::FILE_DEFECT_DAMAGE_PHOTO) {
                    $contract_trilateral_car_deposit_files[] = [
                        'type' => $type,
                        'original_name' => $file->getClientOriginalName(),
                        'path' => Storage::putFile('public/contract_trilateral_car_deposit', $file),
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
        $contract_trilateral_car_deposit->files()->createMany($contract_trilateral_car_deposit_files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено сохранение контракта');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $zalog_autozalog3x
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $zalog_autozalog3x)
    {
        $contract = $zalog_autozalog3x;

        return view('products.zalog.autozalog3x.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_trilateral_car_deposit' => $contract->contract_model,
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $zalog_autozalog3x
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $zalog_autozalog3x)
    {
        $contract = $zalog_autozalog3x;

        return view('products.zalog.autozalog3x.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_trilateral_car_deposit' => $contract->contract_model,
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $zalog_autozalog3x
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $zalog_autozalog3x)
    {
        $request->validate(array_merge(
            Beneficiary::$validate,
            Client::$validate,
            Contract::$validate,
            ContractTrilateralCarDeposit::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policies.*.franchise' => ['required', 'numeric', 'min:0'],

                'policies.*.policy_trilateral_car_deposit.issue_year' => 'required',
                'policies.*.policy_trilateral_car_deposit.brand' => 'required',
                'policies.*.policy_trilateral_car_deposit.model' => 'required',
                'policies.*.policy_trilateral_car_deposit.government_number' => 'required',
                'policies.*.policy_trilateral_car_deposit.techpassport_number' => 'required',
                'policies.*.policy_trilateral_car_deposit.modification' => 'required',
                'policies.*.policy_trilateral_car_deposit.engine_number' => 'required',
                'policies.*.policy_trilateral_car_deposit.carcase_number' => 'required',
                'policies.*.policy_trilateral_car_deposit.carrying_capacity' => 'required',
                'policies.*.policy_trilateral_car_deposit.insurance_value' => ['required', 'numeric', 'min:0'],

                'tranches.*.sum' => ['required', 'numeric', 'min:0'],
                'tranches.*.from' => 'required',
            ]
        ));

        $contract = $zalog_autozalog3x;

        $beneficiary = $contract->beneficiary;
        $beneficiary->fill($request['beneficiary']);
        $beneficiary->save();

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_trilateral_car_deposit = $contract->contract_model;
        $contract_trilateral_car_deposit->fill($request['contract_trilateral_car_deposit']);
        $contract_trilateral_car_deposit->save();

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
                    $policy_trilateral_car_deposit = $policy->policy_model;
                    $policy_trilateral_car_deposit->fill($policy_data['policy_trilateral_car_deposit']);
                    $policy_trilateral_car_deposit->save();

                    unset($policy_data['policy_trilateral_car_deposit']);

                    $policy->fill($policy_data);
                    $policy->save();
                } else {
                    $policy = Policy::where('name', '=', $policy_data['name'])
                                    ->where('series', '=', $policy_data['series'])
                                    ->get()
                                    ->first();

                    if ($policy) {
                        $policy_trilateral_car_deposit = PolicyTrilateralCarDeposit::create($policy_data['policy_trilateral_car_deposit']);

                        unset($policy_data['policy_trilateral_car_deposit']);

                        $policy_data['contract_id'] = $contract->id;
                        $policy_data['model_type'] = PolicyTrilateralCarDeposit::class;
                        $policy_data['model_id'] = $policy_trilateral_car_deposit->id;

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
        $contract_trilateral_car_deposit_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file) {
                if ($type == ContractTrilateralCarDeposit::FILE_DEFECT_DAMAGE_PHOTO) {  // TODO: упростить логику
                    if ($old_file = $contract_trilateral_car_deposit->getFile($type)) {
                        $old_file->delete();
                    }

                    $contract_trilateral_car_deposit_files[] = [
                        'type' => $type,
                        'original_name' => $file->getClientOriginalName(),
                        'path' => Storage::putFile('public/contract_trilateral_car_deposit', $file),
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
        $contract_trilateral_car_deposit->files()->createMany($contract_trilateral_car_deposit_files);

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено изменение контракта');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $zalog_autozalog3x
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $zalog_autozalog3x)
    {
        $contract = $zalog_autozalog3x;

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
