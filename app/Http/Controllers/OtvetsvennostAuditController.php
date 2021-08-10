<?php

namespace App\Http\Controllers;

use App\AuditInfo;
use App\AuditTurnover;
use App\CurrencyTerm;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractAuditor;
use App\Model\Employee;
use App\Model\Policy;
use App\Model\PolicyAuditor;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Bank;
use App\OtvetsvennostAudit;
use App\Product3777;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OtvetsvennostAuditController extends Controller
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

        $specification = Specification::where('key', '=', 'S_IPRA')->get()->first();

        $contract = new Contract();
        $contract_auditor = new ContractAuditor();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_LEGAL;
        }
        if (isset($old_data['policies'])) {
            foreach ($old_data['policies'] as $key => $item) {
                $policy = new Policy();
                $policy->policy_model = new PolicyAuditor();

                $contract->policies[$key] = $policy;
            }
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('audit.form', [
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_auditor' => $contract_auditor,
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
            ContractAuditor::$validate,
            [
                'tranches.*.sum' => 'required',
                'tranches.*.from' => 'required',

                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.polis_from_date' => 'required',
                'policies.*.polis_to_date' => 'required',
                'policies.*.insurance_sum' => 'required',
                'policies.*.franchise' => 'required',

                'policies.*.policy_auditor.fio' => 'required',
                'policies.*.policy_auditor.speciality' => 'required',
                'policies.*.policy_auditor.work_experience' => 'required',
                'policies.*.policy_auditor.position' => 'required',
                'policies.*.policy_auditor.start_date' => 'required',
                'policies.*.policy_auditor.insurance_value' => 'required',
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
        $contract_auditor = ContractAuditor::create($request['contract_auditor']);

        $contract_data = $request['contract'];
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractAuditor::class;
        $contract_data['model_id'] = $contract_auditor->id;

        $contract = Contract::create($contract_data);

        foreach($policies_data as $policy_data) {
            $policy = Policy::where('name', '=', $policy_data['name'])
                            ->where('series', '=', $policy_data['series'])
                            ->get()
                            ->first();

            if ($policy) {
                $policy_auditor = PolicyAuditor::create($policy_data['policy_auditor']);

                unset($policy_data['policy_auditor']);

                $policy_data['contract_id'] = $contract->id;
                $policy_data['model_type'] = PolicyAuditor::class;
                $policy_data['model_id'] = $policy_auditor->id;

                $policy->fill($policy_data);
                $policy->save();
            }
        }

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $contract_files = [];
        $contract_auditor_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, [ContractAuditor::FILE_DOCUMENT])) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        $contract_auditor_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_auditor', $file_item),
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
        $contract_auditor->files()->createMany($contract_auditor_files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено сохранение контракта');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $audit
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $audit)
    {
        $contract = $audit;

        return view('audit.form', [
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_auditor' => $contract->contract_model,
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $audit
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $audit)
    {
        $contract = $audit;

        return view('audit.form', [
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_auditor' => $contract->contract_model,
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $audit
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $audit)
    {
        $request->validate(array_merge(
            Client::$validate,
            Contract::$validate,
            ContractAuditor::$validate,
            [
                'tranches.*.sum' => 'required',
                'tranches.*.from' => 'required',

                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.polis_from_date' => 'required',
                'policies.*.polis_to_date' => 'required',
                'policies.*.insurance_sum' => 'required',
                'policies.*.franchise' => 'required',

                'policies.*.policy_auditor.fio' => 'required',
                'policies.*.policy_auditor.speciality' => 'required',
                'policies.*.policy_auditor.work_experience' => 'required',
                'policies.*.policy_auditor.position' => 'required',
                'policies.*.policy_auditor.start_date' => 'required',
                'policies.*.policy_auditor.insurance_value' => 'required',
            ],
        ));

        $contract = $audit;

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_auditor = $contract->contract_model;
        $contract_auditor->fill($request['contract_auditor']);
        $contract_auditor->save();

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
                    $policy_auditor = $policy->policy_model;
                    $policy_auditor->fill($policy_data['policy_auditor']);
                    $policy_auditor->save();

                    unset($policy_data['policy_auditor']);

                    $policy->fill($policy_data);
                    $policy->save();
                } else {
                    $policy = Policy::where('name', '=', $policy_data['name'])
                                    ->where('series', '=', $policy_data['series'])
                                    ->get()
                                    ->first();

                    if ($policy) {
                        $policy_auditor = PolicyAuditor::create($policy_data['policy_auditor']);

                        unset($policy_data['policy_auditor']);

                        $policy_data['contract_id'] = $contract->id;
                        $policy_data['model_type'] = PolicyAuditor::class;
                        $policy_data['model_id'] = $policy_auditor->id;

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
        $contract_auditor_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, [ContractAuditor::FILE_DOCUMENT])) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        foreach($contract_auditor->getFiles($type) as $old_file) {
                            $old_file->delete();
                        }

                        $contract_auditor_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_auditor', $file_item),
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
        $contract_auditor->files()->createMany($contract_auditor_files);

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено изменение контракта');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $audit
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $audit)
    {
        $contract = $audit;

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
