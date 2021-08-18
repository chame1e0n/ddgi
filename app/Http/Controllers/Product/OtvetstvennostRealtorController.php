<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Helpers\Convertio\Convertio;
use App\Http\Requests\OtvetstvennostRealtorRequest;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractRealtor;
use App\Model\Employee;
use App\Model\Policy;
use App\Model\PolicyRealtor;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PolicyHolder;
use App\Models\Product\OtvetstvennostRealtor;
use App\Models\Product\OtvetstvennostRealtorInfo;
use App\Models\Product\OtvetstvennostRealtorStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;

class OtvetstvennostRealtorController extends Controller
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

        $specification = Specification::where('key', '=', 'S_RCLI')->get()->first();

        $contract = new Contract();
        $contract_realtor = new ContractRealtor();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_LEGAL;
        }
        if (isset($old_data['policies'])) {
            foreach ($old_data['policies'] as $key => $item) {
                $policy = new Policy();
                $policy->policy_model = new PolicyRealtor();

                $contract->policies[$key] = $policy;
            }
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('products.otvetstvennost.realtor.form', [
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_realtor' => $contract_realtor,
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
            ContractRealtor::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.polis_from_date' => 'required',
                'policies.*.polis_to_date' => 'required',
                'policies.*.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policies.*.franchise' => ['required', 'numeric', 'min:0'],

                'policies.*.policy_realtor.fio' => 'required',
                'policies.*.policy_realtor.speciality' => 'required',
                'policies.*.policy_realtor.work_experience' => 'required',
                'policies.*.policy_realtor.position' => 'required',
                'policies.*.policy_realtor.start_date' => 'required',
                'policies.*.policy_realtor.insurance_value' => ['required', 'numeric', 'min:0'],

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
        $contract_realtor = ContractRealtor::create($request['contract_realtor']);

        $contract_data = $request['contract'];
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractRealtor::class;
        $contract_data['model_id'] = $contract_realtor->id;

        $contract = Contract::create($contract_data);

        foreach($policies_data as $policy_data) {
            $policy = Policy::where('name', '=', $policy_data['name'])
                            ->where('series', '=', $policy_data['series'])
                            ->get()
                            ->first();

            if ($policy) {
                $policy_realtor = PolicyRealtor::create($policy_data['policy_realtor']);

                unset($policy_data['policy_realtor']);

                $policy_data['contract_id'] = $contract->id;
                $policy_data['model_type'] = PolicyRealtor::class;
                $policy_data['model_id'] = $policy_realtor->id;

                $policy->fill($policy_data);
                $policy->save();
            }
        }

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $contract_files = [];
        $contract_realtor_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, [ContractRealtor::FILE_DOCUMENT])) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        $contract_realtor_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_realtor', $file_item),
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
        $contract_realtor->files()->createMany($contract_realtor_files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено сохранение контракта');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $otvetstvennost_realtor
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $otvetstvennost_realtor)
    {
        $contract = $otvetstvennost_realtor;

        return view('products.otvetstvennost.realtor.form', [
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_realtor' => $contract->contract_model,
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $otvetstvennost_realtor
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $otvetstvennost_realtor)
    {
        $contract = $otvetstvennost_realtor;

        return view('products.otvetstvennost.realtor.form', [
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_realtor' => $contract->contract_model,
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $otvetstvennost_realtor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $otvetstvennost_realtor)
    {
        $request->validate(array_merge(
            Client::$validate,
            Contract::$validate,
            ContractRealtor::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.polis_from_date' => 'required',
                'policies.*.polis_to_date' => 'required',
                'policies.*.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policies.*.franchise' => ['required', 'numeric', 'min:0'],

                'policies.*.policy_realtor.fio' => 'required',
                'policies.*.policy_realtor.speciality' => 'required',
                'policies.*.policy_realtor.work_experience' => 'required',
                'policies.*.policy_realtor.position' => 'required',
                'policies.*.policy_realtor.start_date' => 'required',
                'policies.*.policy_realtor.insurance_value' => ['required', 'numeric', 'min:0'],

                'tranches.*.sum' => ['required', 'numeric', 'min:0'],
                'tranches.*.from' => 'required',
            ],
        ));

        $contract = $otvetstvennost_realtor;

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_realtor = $contract->contract_model;
        $contract_realtor->fill($request['contract_realtor']);
        $contract_realtor->save();

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
                    $policy_realtor = $policy->policy_model;
                    $policy_realtor->fill($policy_data['policy_realtor']);
                    $policy_realtor->save();

                    unset($policy_data['policy_realtor']);

                    $policy->fill($policy_data);
                    $policy->save();
                } else {
                    $policy = Policy::where('name', '=', $policy_data['name'])
                                    ->where('series', '=', $policy_data['series'])
                                    ->get()
                                    ->first();

                    if ($policy) {
                        $policy_realtor = PolicyRealtor::create($policy_data['policy_realtor']);

                        unset($policy_data['policy_realtor']);

                        $policy_data['contract_id'] = $contract->id;
                        $policy_data['model_type'] = PolicyRealtor::class;
                        $policy_data['model_id'] = $policy_realtor->id;

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
        $contract_realtor_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, [ContractRealtor::FILE_DOCUMENT])) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        foreach($contract_realtor->getFiles($type) as $old_file) {
                            $old_file->delete();
                        }

                        $contract_realtor_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_realtor', $file_item),
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
        $contract_realtor->files()->createMany($contract_realtor_files);

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено изменение контракта');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $otvetstvennost_realtor
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $otvetstvennost_realtor)
    {
        $contract = $otvetstvennost_realtor;

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
