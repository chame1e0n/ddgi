<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotaryRequest;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractNotary;
use App\Model\Employee;
use App\Model\NotaryEmployee;
use App\Model\Policy;
use App\Model\PolicyNotary;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\Notary;
use App\Models\NotaryGrey;
use App\Models\NotaryPaymentTerm;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class NotaryController extends Controller
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

        $specification = Specification::where('key', '=', 'S_PLION')->get()->first();

        $contract = new Contract();
        $contract_notary = new ContractNotary();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_LEGAL;
        }
        if (isset($old_data['notary_employees'])) {
            foreach ($old_data['notary_employees'] as $item) {
                $contract_notary->notary_employees[] = new NotaryEmployee();
            }
        }
        if (isset($old_data['policies'])) {
            foreach ($old_data['policies'] as $key => $item) {
                $policy = new Policy();
                $policy->policy_model = new PolicyNotary();

                $contract->policies[$key] = $policy;
            }
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('products.otvetstvennost.notaries.form', [
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_notary' => $contract_notary,
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
            Client::$validate,
            Contract::$validate,
            ContractNotary::$validate,
            [
                'notary_employees.*.number' => 'required',
                'notary_employees.*.administrator' => 'required',
                'notary_employees.*.composition' => 'required',
                'notary_employees.*.other' => 'required',

                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.polis_from_date' => 'required',
                'policies.*.polis_to_date' => 'required',
                'policies.*.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policies.*.franchise' => ['required', 'numeric', 'min:0'],

                'policies.*.policy_notary.fio' => 'required',
                'policies.*.policy_notary.speciality' => 'required',
                'policies.*.policy_notary.work_experience' => 'required',
                'policies.*.policy_notary.position' => 'required',
                'policies.*.policy_notary.start_date' => 'required',
                'policies.*.policy_notary.insurance_value' => ['required', 'numeric', 'min:0'],

                'tranches.*.sum' => ['required', 'numeric', 'min:0'],
                'tranches.*.from' => 'required',
            ],
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

        $client = Client::create($request['client']);
        $contract_notary = ContractNotary::create($request['contract_notary']);

        $contract_data = $request['contract'];
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractNotary::class;
        $contract_data['model_id'] = $contract_notary->id;

        $contract = Contract::create($contract_data);

        foreach($policies_data as $policy_data) {
            $policy = Policy::where('name', '=', $policy_data['name'])
                            ->where('series', '=', $policy_data['series'])
                            ->get()
                            ->first();

            if ($policy) {
                $policy_notary = PolicyNotary::create($policy_data['policy_notary']);

                unset($policy_data['policy_notary']);

                $policy_data['contract_id'] = $contract->id;
                $policy_data['model_type'] = PolicyNotary::class;
                $policy_data['model_id'] = $policy_notary->id;

                $policy->fill($policy_data);
                $policy->save();
            }
        }

        if ($request['notary_employees']) {
            $contract_notary->notary_employees()->createMany($request['notary_employees']);
        }

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $contract_files = [];
        $contract_notary_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, [ContractNotary::FILE_DOCUMENT])) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        $contract_notary_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_notary', $file_item),
                        ];
                    }
                } else {
                    $file = $file_collection;

                    $contract_files[] = [
                        'type' => $type,
                        'original_name' => $file->getClientOriginalName(),
                        'path' => Storage::putFile('public/contract', $file),
                    ];
                }
            }
        }

        $contract->files()->createMany($contract_files);
        $contract_notary->files()->createMany($contract_notary_files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено сохранение контракта');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $otvetstvennost_notary
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $otvetstvennost_notary)
    {
        $contract = $otvetstvennost_notary;

        return view('products.otvetstvennost.notaries.form', [
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_notary' => $contract->contract_model,
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $otvetstvennost_notary
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $otvetstvennost_notary)
    {
        $contract = $otvetstvennost_notary;

        return view('products.otvetstvennost.notaries.form', [
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_notary' => $contract->contract_model,
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $otvetstvennost_notary
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $otvetstvennost_notary)
    {
        $request->validate(array_merge(
            Client::$validate,
            Contract::$validate,
            ContractNotary::$validate,
            [
                'notary_employees.*.number' => 'required',
                'notary_employees.*.administrator' => 'required',
                'notary_employees.*.composition' => 'required',
                'notary_employees.*.other' => 'required',

                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.polis_from_date' => 'required',
                'policies.*.polis_to_date' => 'required',
                'policies.*.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policies.*.franchise' => ['required', 'numeric', 'min:0'],

                'policies.*.policy_notary.fio' => 'required',
                'policies.*.policy_notary.speciality' => 'required',
                'policies.*.policy_notary.work_experience' => 'required',
                'policies.*.policy_notary.position' => 'required',
                'policies.*.policy_notary.start_date' => 'required',
                'policies.*.policy_notary.insurance_value' => ['required', 'numeric', 'min:0'],

                'tranches.*.sum' => ['required', 'numeric', 'min:0'],
                'tranches.*.from' => 'required',
            ],
        ));

        $contract = $otvetstvennost_notary;

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_notary = $contract->contract_model;
        $contract_notary->fill($request['contract_notary']);
        $contract_notary->save();

        $contract->fill($request['contract']);
        $contract->save();

        if ($request['notary_employees']) {
            $notary_employee_ids = [];

            foreach($request['notary_employees'] as $notary_employee_data) {
                $notary_employee = NotaryEmployee::where('contract_notary_id', '=', $contract_notary->id)
                                                 ->where('number', '=', $notary_employee_data['number'])
                                                 ->where('administrator', '=', $notary_employee_data['administrator'])
                                                 ->where('composition', '=', $notary_employee_data['composition'])
                                                 ->where('other', '=', $notary_employee_data['other'])
                                                 ->get()
                                                 ->first();

                if (!$notary_employee) {
                    $notary_employee = $contract_notary->notary_employees()->create($notary_employee_data);
                }

                $notary_employee_ids[] = $notary_employee->id;
            }

            NotaryEmployee::where('contract_notary_id', '=', $contract_notary->id)
                          ->whereNotIn('id', $notary_employee_ids)
                          ->delete();
        }

        if ($request['policies']) {
            $policies_ids = [];
            foreach($request['policies'] as $policy_data) {
                $policy = Policy::where('contract_id', '=', $contract->id)
                                ->where('name', '=', $policy_data['name'])
                                ->where('series', '=', $policy_data['series'])
                                ->get()
                                ->first();

                if ($policy) {
                    $policy_notary = $policy->policy_model;
                    $policy_notary->fill($policy_data['policy_notary']);
                    $policy_notary->save();

                    unset($policy_data['policy_notary']);

                    $policy->fill($policy_data);
                    $policy->save();
                } else {
                    $policy = Policy::where('name', '=', $policy_data['name'])
                                    ->where('series', '=', $policy_data['series'])
                                    ->get()
                                    ->first();

                    if ($policy) {
                        $policy_notary = PolicyNotary::create($policy_data['policy_notary']);

                        unset($policy_data['policy_notary']);

                        $policy_data['contract_id'] = $contract->id;
                        $policy_data['model_type'] = PolicyNotary::class;
                        $policy_data['model_id'] = $policy_notary->id;

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
        $contract_notary_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, [ContractNotary::FILE_DOCUMENT])) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        foreach($contract_notary->getFiles($type) as $old_file) {
                            $old_file->delete();
                        }

                        $contract_notary_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_notary', $file_item),
                        ];
                    }
                } else {
                    $file = $file_collection;

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
        $contract_notary->files()->createMany($contract_notary_files);

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено изменение контракта');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $otvetstvennost_notary
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $otvetstvennost_notary)
    {
        $contract = $otvetstvennost_notary;

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
