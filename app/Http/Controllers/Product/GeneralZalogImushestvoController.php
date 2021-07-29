<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ZalogImushestvoRequest;
use App\Model\Client;
use App\Model\Beneficiary;
use App\Model\Contract;
use App\Model\ContractGeneralPropertyPledge;
use App\Model\Employee;
use App\Model\Policy;
use App\Model\Property;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Product\ZalogImushestvo;
use App\Models\Product\ZalogImushestvoInfo;
use App\Models\Product\ZalogImushestvoStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GeneralZalogImushestvoController extends Controller
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

        $specification = Specification::where('key', '=', 'S_PIP')->get()->first();

        $contract = new Contract();
        $contract_general_property_pledge = new ContractGeneralPropertyPledge();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_INDIVIDUAL;
        }
        if (isset($old_data['properties'])) {
            foreach ($old_data['properties'] as $item) {
                $contract_general_property_pledge->properties[] = new Property();
            }
        }

        return view('products.zalog.general.form', [
            'beneficiary' => new Beneficiary(),
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_general_property_pledge' => $contract_general_property_pledge,
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
            Beneficiary::$validate,
            Client::$validate,
            Contract::$validate,
            ContractGeneralPropertyPledge::$validate,
            [
                'policy.name' => 'required',
                'policy.series' => 'required',
                'policy.date_of_issue' => 'required',
                'policy.polis_from_date' => 'required',
                'policy.polis_to_date' => 'required',
                'policy.insurance_sum' => 'required',
                'policy.franchise' => 'required',
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

        $beneficiary = Beneficiary::create($request['beneficiary']);
        $client = Client::create($request['client']);
        $contract_general_property_pledge = ContractGeneralPropertyPledge::create($request['contract_general_property_pledge']);

        $contract_data = $request['contract'];
        $contract_data['beneficiary_id'] = $beneficiary->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractGeneralPropertyPledge::class;
        $contract_data['model_id'] = $contract_general_property_pledge->id;

        $contract = Contract::create($contract_data);

        $policy_data['contract_id'] = $contract->id;

        $policy->fill($policy_data);
        $policy->save();

        if ($request['properties']) {
            $contract_general_property_pledge->properties()->createMany($request['properties']);
        }

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $contract_general_property_pledge_file_types = [
            ContractGeneralPropertyPledge::FILE_OTHER_DOCUMENT,
            ContractGeneralPropertyPledge::FILE_PASSPORT,
            ContractGeneralPropertyPledge::FILE_REFERENCE,
            ContractGeneralPropertyPledge::FILE_TREATY,
        ];

        $contract_files = [];
        $contract_general_property_pledge_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, $contract_general_property_pledge_file_types)) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        $contract_general_property_pledge_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_general_property_pledge', $file_item),
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
        $contract_general_property_pledge->files()->createMany($contract_general_property_pledge_files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено сохранение контракта');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $general_zalog_imushestvo
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $general_zalog_imushestvo)
    {
        $contract = $general_zalog_imushestvo;

        return view('products.zalog.general.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_general_property_pledge' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $general_zalog_imushestvo
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $general_zalog_imushestvo)
    {
        $contract = $general_zalog_imushestvo;

        return view('products.zalog.general.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_general_property_pledge' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $general_zalog_imushestvo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $general_zalog_imushestvo)
    {
        $request->validate(array_merge(
            Beneficiary::$validate,
            Client::$validate,
            Contract::$validate,
            ContractGeneralPropertyPledge::$validate,
            [
                'policy.name' => 'required',
                'policy.series' => 'required',
                'policy.date_of_issue' => 'required',
                'policy.polis_from_date' => 'required',
                'policy.polis_to_date' => 'required',
                'policy.insurance_sum' => 'required',
                'policy.franchise' => 'required',
            ]
        ));

        $contract = $general_zalog_imushestvo;

        $beneficiary = $contract->beneficiary;
        $beneficiary->fill($request['beneficiary']);
        $beneficiary->save();

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_general_property_pledge = $contract->contract_model;
        $contract_general_property_pledge->fill($request['contract_general_property_pledge']);
        $contract_general_property_pledge->save();

        $contract->fill($request['contract']);
        $contract->save();

        $policy = $contract->policies->first();
        $policy->fill($request['policy']);
        $policy->save();

        if ($request['properties']) {
            $properties_ids = [];

            foreach($request['properties'] as $property_data) {
                $property = Property::where('model_type', '=', ContractGeneralPropertyPledge::class)
                                    ->where('model_id', '=', $contract_general_property_pledge->id)
                                    ->where('name', '=', $property_data['name'])
                                    ->where('location', '=', $property_data['location'])
                                    ->get()
                                    ->first();

                if ($property) {
                    $property->fill($property_data);
                    $property->save();
                } else {
                    $property_data['model_type'] = ContractGeneralPropertyPledge::class;
                    $property_data['model_id'] = $contract_general_property_pledge->id;

                    $property = Property::create($property_data);
                }

                $properties_ids[] = $property->id;
            }

            $properties = Property::where('model_type', '=', ContractGeneralPropertyPledge::class)
                                  ->where('model_id', '=', $contract_general_property_pledge->id)
                                  ->whereNotIn('id', $properties_ids)
                                  ->get();
            foreach($properties as /* @var $property Property */ $property) {
                $property->delete();
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

        $contract_general_property_pledge_file_types = [
            ContractGeneralPropertyPledge::FILE_OTHER_DOCUMENT,
            ContractGeneralPropertyPledge::FILE_PASSPORT,
            ContractGeneralPropertyPledge::FILE_REFERENCE,
            ContractGeneralPropertyPledge::FILE_TREATY,
        ];

        $contract_files = [];
        $contract_general_property_pledge_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, $contract_general_property_pledge_file_types)) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        foreach($contract_general_property_pledge->getFiles($type) as $old_file) {
                            $old_file->delete();
                        }

                        $contract_general_property_pledge_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_general_property_pledge', $file_item),
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
        $contract_general_property_pledge->files()->createMany($contract_general_property_pledge_files);

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено изменение контракта');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $general_zalog_imushestvo
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $general_zalog_imushestvo)
    {
        $contract = $general_zalog_imushestvo;

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
