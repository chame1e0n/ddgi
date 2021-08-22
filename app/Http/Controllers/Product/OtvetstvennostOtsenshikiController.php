<?php

namespace App\Http\Controllers\Product;

use App\Helpers\Convertio\Convertio;
use App\Http\Controllers\Controller;
use App\Http\Requests\OtvetstvennostOtsenshikiRequest;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractEvaluator;
use App\Model\Employee;
use App\Model\Policy;
use App\Model\PolicyEvaluator;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PolicyHolder;
use App\Models\Product\OtvetstvennostOtsenshiki;
use App\Models\Product\OtvetstvennostOtsenshikiInfo;
use App\Models\Product\OtvetstvennostOtsenshikiStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;

class OtvetstvennostOtsenshikiController extends Controller
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

        $specification = Specification::where('key', '=', 'S_PLIFA')->get()->first();

        $contract = new Contract();
        $contract_evaluator = new ContractEvaluator();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = request('type', Contract::TYPE_LEGAL);
        }
        if (isset($old_data['policies'])) {
            foreach ($old_data['policies'] as $key => $item) {
                $policy = new Policy();
                $policy->policy_model = new PolicyEvaluator();

                $contract->policies[$key] = $policy;
            }
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('products.otvetstvennost.otsenshiki.form', [
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_evaluator' => $contract_evaluator,
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
            ContractEvaluator::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.polis_from_date' => 'required',
                'policies.*.polis_to_date' => 'required',
                'policies.*.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policies.*.franchise' => ['required', 'numeric', 'min:0'],

                'policies.*.policy_evaluator.fio' => 'required',
                'policies.*.policy_evaluator.speciality' => 'required',
                'policies.*.policy_evaluator.work_experience' => 'required',
                'policies.*.policy_evaluator.position' => 'required',
                'policies.*.policy_evaluator.start_date' => 'required',
                'policies.*.policy_evaluator.insurance_value' => ['required', 'numeric', 'min:0'],

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
        $contract_evaluator = ContractEvaluator::create($request['contract_evaluator']);

        $contract_data = $request['contract'];
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractEvaluator::class;
        $contract_data['model_id'] = $contract_evaluator->id;

        $contract = Contract::create($contract_data);

        foreach($policies_data as $policy_data) {
            $policy = Policy::where('name', '=', $policy_data['name'])
                            ->where('series', '=', $policy_data['series'])
                            ->get()
                            ->first();

            if ($policy) {
                $policy_evaluator = PolicyEvaluator::create($policy_data['policy_evaluator']);

                unset($policy_data['policy_evaluator']);

                $policy_data['contract_id'] = $contract->id;
                $policy_data['model_type'] = PolicyEvaluator::class;
                $policy_data['model_id'] = $policy_evaluator->id;

                $policy->fill($policy_data);
                $policy->save();
            }
        }

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $contract_files = [];
        $contract_evaluator_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, [ContractEvaluator::FILE_DOCUMENT])) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        $contract_evaluator_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_evaluator', $file_item),
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
        $contract_evaluator->files()->createMany($contract_evaluator_files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено сохранение контракта');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $otvetstvennost_otsenshiki
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $otvetstvennost_otsenshiki)
    {
        $contract = $otvetstvennost_otsenshiki;

        return view('products.otvetstvennost.otsenshiki.form', [
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_evaluator' => $contract->contract_model,
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $otvetstvennost_otsenshiki
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $otvetstvennost_otsenshiki)
    {
        $contract = $otvetstvennost_otsenshiki;

        return view('products.otvetstvennost.otsenshiki.form', [
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_evaluator' => $contract->contract_model,
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $otvetstvennost_otsenshiki
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $otvetstvennost_otsenshiki)
    {
        $request->validate(array_merge(
            Client::$validate,
            Contract::$validate,
            ContractEvaluator::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.polis_from_date' => 'required',
                'policies.*.polis_to_date' => 'required',
                'policies.*.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policies.*.franchise' => ['required', 'numeric', 'min:0'],

                'policies.*.policy_evaluator.fio' => 'required',
                'policies.*.policy_evaluator.speciality' => 'required',
                'policies.*.policy_evaluator.work_experience' => 'required',
                'policies.*.policy_evaluator.position' => 'required',
                'policies.*.policy_evaluator.start_date' => 'required',
                'policies.*.policy_evaluator.insurance_value' => ['required', 'numeric', 'min:0'],

                'tranches.*.sum' => ['required', 'numeric', 'min:0'],
                'tranches.*.from' => 'required',
            ],
        ));

        $contract = $otvetstvennost_otsenshiki;

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_evaluator = $contract->contract_model;
        $contract_evaluator->fill($request['contract_evaluator']);
        $contract_evaluator->save();

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
                    $policy_evaluator = $policy->policy_model;
                    $policy_evaluator->fill($policy_data['policy_evaluator']);
                    $policy_evaluator->save();

                    unset($policy_data['policy_evaluator']);

                    $policy->fill($policy_data);
                    $policy->save();
                } else {
                    $policy = Policy::where('name', '=', $policy_data['name'])
                                    ->where('series', '=', $policy_data['series'])
                                    ->get()
                                    ->first();

                    if ($policy) {
                        $policy_evaluator = PolicyEvaluator::create($policy_data['policy_evaluator']);

                        unset($policy_data['policy_evaluator']);

                        $policy_data['contract_id'] = $contract->id;
                        $policy_data['model_type'] = PolicyEvaluator::class;
                        $policy_data['model_id'] = $policy_evaluator->id;

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
        $contract_evaluator_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, [ContractEvaluator::FILE_DOCUMENT])) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        foreach($contract_evaluator->getFiles($type) as $old_file) {
                            $old_file->delete();
                        }

                        $contract_evaluator_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_evaluator', $file_item),
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
        $contract_evaluator->files()->createMany($contract_evaluator_files);

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено изменение контракта');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $otvetstvennost_otsenshiki
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $otvetstvennost_otsenshiki)
    {
        $contract = $otvetstvennost_otsenshiki;

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
