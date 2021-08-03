<?php

namespace App\Http\Controllers\Product;

use App\AllProduct;
use App\Http\Controllers\Controller;
use App\Model\Client;
use App\Model\ConstructionParticipant;
use App\Model\Contract;
use App\Model\ContractConstructionInstallationWork;
use App\Model\Policy;
use App\Model\PolicyConstructionInstallationWork;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\Dogovor;
use App\Models\PolicyHolder;
use App\Models\Product\Cmp;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CmpController extends Controller
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

        $specification = Specification::where('key', '=', 'S_IOCAAR')->get()->first();

        $contract = new Contract();
        $contract_construction_installation_work = new ContractConstructionInstallationWork();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_INDIVIDUAL;
        }
        if (isset($old_data['construction_participants'])) {
            foreach ($old_data['construction_participants'] as $item) {
                $contract_construction_installation_work->construction_participants[] = new ConstructionParticipant();
            }
        }

        return view('products.cmp.form', [
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_construction_installation_work' => $contract_construction_installation_work,
            'policy' => new Policy(),
            'policy_construction_installation_work' => new PolicyConstructionInstallationWork(),
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
            ContractConstructionInstallationWork::$validate,
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

                'construction_participants.*.name' => 'required',
            ],
            PolicyConstructionInstallationWork::$validate,
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

        $client = Client::create($request['client']);
        $contract_construction_installation_work = ContractConstructionInstallationWork::create($request['contract_construction_installation_work']);

        $contract_data = $request['contract'];
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractConstructionInstallationWork::class;
        $contract_data['model_id'] = $contract_construction_installation_work->id;

        $contract = Contract::create($contract_data);

        $policy_construction_installation_work = PolicyConstructionInstallationWork::create($request['policy_construction_installation_work']);

        $policy_data['contract_id'] = $contract->id;
        $policy_data['model_type'] = PolicyConstructionInstallationWork::class;
        $policy_data['model_id'] = $policy_construction_installation_work->id;

        $policy->fill($policy_data);
        $policy->save();

        if ($request['construction_participants']) {
            $contract_construction_installation_work->construction_participants()->createMany($request['construction_participants']);
        }

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $contract_files = [];
        $contract_construction_installation_work_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, [ContractConstructionInstallationWork::FILE_DOCUMENT])) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        $contract_construction_installation_work_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_construction_installation_work', $file_item),
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
        $contract_construction_installation_work->files()->createMany($contract_construction_installation_work_files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено сохранение контракта');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $cmp
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $cmp)
    {
        $contract = $cmp;

        return view('products.cmp.form', [
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_construction_installation_work' => $contract->contract_model,
            'policy' => $contract->policies->first(),
            'policy_construction_installation_work' => $contract->policies->first()->policy_model,
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $cmp
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $cmp)
    {
        $contract = $cmp;

        return view('products.cmp.form', [
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_construction_installation_work' => $contract->contract_model,
            'policy' => $contract->policies->first(),
            'policy_construction_installation_work' => $contract->policies->first()->policy_model,
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $cmp
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $cmp)
    {
        $request->validate(array_merge(
            Client::$validate,
            Contract::$validate,
            ContractConstructionInstallationWork::$validate,
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

                'construction_participants.*.name' => 'required',
            ],
            PolicyConstructionInstallationWork::$validate,
        ));

        $contract = $cmp;

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_construction_installation_work = $contract->contract_model;
        $contract_construction_installation_work->fill($request['contract_construction_installation_work']);
        $contract_construction_installation_work->save();

        $contract->fill($request['contract']);
        $contract->save();

        $policy = $contract->policies->first();
        $policy->fill($request['policy']);
        $policy->save();

        $policy_construction_installation_work = $policy->policy_model;
        $policy_construction_installation_work->fill($request['policy_construction_installation_work']);
        $policy_construction_installation_work->save();

        if ($request['construction_participants']) {
            $construction_participant_ids = [];

            foreach($request['construction_participants'] as $construction_participant_data) {
                $construction_participant = ConstructionParticipant::where('contract_construction_installation_work_id', '=', $contract_construction_installation_work->id)
                                                                   ->where('name', '=', $construction_participant_data['name'])
                                                                   ->get()
                                                                   ->first();

                if (!$construction_participant) {
                    $construction_participant = $contract_construction_installation_work->construction_participants()->create($construction_participant_data);
                }

                $construction_participant_ids[] = $construction_participant->id;
            }

            ConstructionParticipant::where('contract_construction_installation_work_id', '=', $contract_construction_installation_work->id)
                                   ->whereNotIn('id', $construction_participant_ids)
                                   ->delete();
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
        $contract_construction_installation_work_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, [ContractConstructionInstallationWork::FILE_DOCUMENT])) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        foreach($contract_construction_installation_work->getFiles($type) as $old_file) {
                            $old_file->delete();
                        }

                        $contract_construction_installation_work_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_construction_installation_work', $file_item),
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
        $contract_construction_installation_work->files()->createMany($contract_construction_installation_work_files);

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено изменение контракта');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $cmp
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $cmp)
    {
        $contract = $cmp;

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
