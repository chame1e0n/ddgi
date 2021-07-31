<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ZalogImushestvoRequest;
use App\Model\Client;
use App\Model\Beneficiary;
use App\Model\Contract;
use App\Model\ContractMortgage;
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

class ZalogIpotekaController extends Controller
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

        $specification = Specification::where('key', '=', 'S_IOREP')->get()->first();

        $contract = new Contract();
        $contract_mortgage = new ContractMortgage();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_INDIVIDUAL;
        }
        if (isset($old_data['properties'])) {
            foreach ($old_data['properties'] as $item) {
                $contract_mortgage->properties[] = new Property();
            }
        }

        return view('products.zalog.ipoteka.form', [
            'beneficiary' => new Beneficiary(),
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_mortgage' => $contract_mortgage,
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
            ContractMortgage::$validate,
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
        $contract_mortgage = ContractMortgage::create($request['contract_mortgage']);

        $contract_data = $request['contract'];
        $contract_data['beneficiary_id'] = $beneficiary->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractMortgage::class;
        $contract_data['model_id'] = $contract_mortgage->id;

        $contract = Contract::create($contract_data);

        $policy_data['contract_id'] = $contract->id;

        $policy->fill($policy_data);
        $policy->save();

        if ($request['properties']) {
            $contract_mortgage->properties()->createMany($request['properties']);
        }

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $contract_mortgage_file_types = [
            ContractMortgage::FILE_OTHER_DOCUMENT,
            ContractMortgage::FILE_PASSPORT,
            ContractMortgage::FILE_REFERENCE,
            ContractMortgage::FILE_TREATY,
        ];

        $contract_files = [];
        $contract_mortgage_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, $contract_mortgage_file_types)) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        $contract_mortgage_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_mortgage', $file_item),
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
        $contract_mortgage->files()->createMany($contract_mortgage_files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено сохранение контракта');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $zalog_ipoteka
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $zalog_ipoteka)
    {
        $contract = $zalog_ipoteka;

        return view('products.zalog.ipoteka.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_mortgage' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $zalog_ipoteka
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $zalog_ipoteka)
    {
        $contract = $zalog_ipoteka;

        return view('products.zalog.ipoteka.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_mortgage' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $zalog_ipoteka
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $zalog_ipoteka)
    {
        $request->validate(array_merge(
            Beneficiary::$validate,
            Client::$validate,
            Contract::$validate,
            ContractMortgage::$validate,
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

        $contract = $zalog_ipoteka;

        $beneficiary = $contract->beneficiary;
        $beneficiary->fill($request['beneficiary']);
        $beneficiary->save();

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_mortgage = $contract->contract_model;
        $contract_mortgage->fill($request['contract_mortgage']);
        $contract_mortgage->save();

        $contract->fill($request['contract']);
        $contract->save();

        $policy = $contract->policies->first();
        $policy->fill($request['policy']);
        $policy->save();

        if ($request['properties']) {
            $properties_ids = [];

            foreach($request['properties'] as $property_data) {
                $property = Property::where('model_type', '=', ContractMortgage::class)
                                    ->where('model_id', '=', $contract_mortgage->id)
                                    ->where('name', '=', $property_data['name'])
                                    ->where('location', '=', $property_data['location'])
                                    ->get()
                                    ->first();

                if ($property) {
                    $property->fill($property_data);
                    $property->save();
                } else {
                    $property_data['model_type'] = ContractMortgage::class;
                    $property_data['model_id'] = $contract_mortgage->id;

                    $property = Property::create($property_data);
                }

                $properties_ids[] = $property->id;
            }

            $properties = Property::where('model_type', '=', ContractMortgage::class)
                                  ->where('model_id', '=', $contract_mortgage->id)
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

        $contract_mortgage_file_types = [
            ContractMortgage::FILE_OTHER_DOCUMENT,
            ContractMortgage::FILE_PASSPORT,
            ContractMortgage::FILE_REFERENCE,
            ContractMortgage::FILE_TREATY,
        ];

        $contract_files = [];
        $contract_mortgage_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, $contract_mortgage_file_types)) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        foreach($contract_mortgage->getFiles($type) as $old_file) {
                            $old_file->delete();
                        }

                        $contract_mortgage_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_mortgage', $file_item),
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
        $contract_mortgage->files()->createMany($contract_mortgage_files);

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено изменение контракта');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $zalog_ipoteka
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $zalog_ipoteka)
    {
        $contract = $zalog_ipoteka;

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
