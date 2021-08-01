<?php

namespace App\Http\Controllers;

use App\Model\Beneficiary;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractPropertyLeasing;
use App\Model\Policy;
use App\Model\Property;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PropertyLising;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyLisingZalog extends Controller
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

        $specification = Specification::where('key', '=', 'S_LPI')->get()->first();

        $contract = new Contract();
        $contract_property_leasing = new ContractPropertyLeasing();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_INDIVIDUAL;
        }
        if (isset($old_data['properties'])) {
            foreach ($old_data['properties'] as $item) {
                $contract_mortgage->properties[] = new Property();
            }
        }

        return view('products.about-imushestvo-lizing-zalog.form', [
            'beneficiary' => new Beneficiary(),
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_property_leasing' => $contract_property_leasing,
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
            ContractPropertyLeasing::$validate,
            [
                'policy.name' => 'required',
                'policy.series' => 'required',
                'policy.date_of_issue' => 'required',
                'policy.polis_from_date' => 'required',
                'policy.polis_to_date' => 'required',
                'policy.insurance_sum' => 'required',
                'policy.franchise' => 'required',

                'properties.*.name' => 'required',
                'properties.*.location' => 'required',
                'properties.*.insurance_value' => 'required',
                'properties.*.insurance_sum' => 'required',
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
        $contract_property_leasing = ContractPropertyLeasing::create($request['contract_property_leasing']);

        $contract_data = $request['contract'];
        $contract_data['beneficiary_id'] = $beneficiary->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractPropertyLeasing::class;
        $contract_data['model_id'] = $contract_property_leasing->id;

        $contract = Contract::create($contract_data);

        $policy_data['contract_id'] = $contract->id;

        $policy->fill($policy_data);
        $policy->save();

        if ($request['properties']) {
            $contract_property_leasing->properties()->createMany($request['properties']);
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
     * @param  \App\Model\Contract $imushestvo_lizing_zalog
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $imushestvo_lizing_zalog)
    {
        $contract = $imushestvo_lizing_zalog;

        return view('products.about-imushestvo-lizing-zalog.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_property_leasing' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $imushestvo_lizing_zalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $imushestvo_lizing_zalog)
    {
        $contract = $imushestvo_lizing_zalog;

        return view('products.about-imushestvo-lizing-zalog.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_property_leasing' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $imushestvo_lizing_zalog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $imushestvo_lizing_zalog)
    {
        $request->validate(array_merge(
            Beneficiary::$validate,
            Client::$validate,
            Contract::$validate,
            ContractPropertyLeasing::$validate,
            [
                'policy.name' => 'required',
                'policy.series' => 'required',
                'policy.date_of_issue' => 'required',
                'policy.polis_from_date' => 'required',
                'policy.polis_to_date' => 'required',
                'policy.insurance_sum' => 'required',
                'policy.franchise' => 'required',

                'properties.*.name' => 'required',
                'properties.*.location' => 'required',
                'properties.*.insurance_value' => 'required',
                'properties.*.insurance_sum' => 'required',
            ]
        ));

        $contract = $imushestvo_lizing_zalog;

        $beneficiary = $contract->beneficiary;
        $beneficiary->fill($request['beneficiary']);
        $beneficiary->save();

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_property_leasing = $contract->contract_model;
        $contract_property_leasing->fill($request['contract_property_leasing']);
        $contract_property_leasing->save();

        $contract->fill($request['contract']);
        $contract->save();

        $policy = $contract->policies->first();
        $policy->fill($request['policy']);
        $policy->save();

        if ($request['properties']) {
            $properties_ids = [];

            foreach($request['properties'] as $property_data) {
                $property = Property::where('model_type', '=', ContractPropertyLeasing::class)
                                    ->where('model_id', '=', $contract_property_leasing->id)
                                    ->where('name', '=', $property_data['name'])
                                    ->where('location', '=', $property_data['location'])
                                    ->get()
                                    ->first();

                if ($property) {
                    $property->fill($property_data);
                    $property->save();
                } else {
                    $property_data['model_type'] = ContractPropertyLeasing::class;
                    $property_data['model_id'] = $contract_property_leasing->id;

                    $property = Property::create($property_data);
                }

                $properties_ids[] = $property->id;
            }

            $properties = Property::where('model_type', '=', ContractPropertyLeasing::class)
                                  ->where('model_id', '=', $contract_property_leasing->id)
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
     * @param  \App\Model\Contract $imushestvo_lizing_zalog
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $imushestvo_lizing_zalog)
    {
        $contract = $imushestvo_lizing_zalog;

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
