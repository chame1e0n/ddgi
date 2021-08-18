<?php

namespace App\Http\Controllers\Product;

use App\AllProduct;
use App\AllProductInformation;
use App\AllProductsTermsTransh;
use App\Http\Controllers\Controller;
use App\Model\Beneficiary;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractProperty;
use App\Model\Policy;
use App\Model\Property;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DobrovolkaImushestvoController extends Controller
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

        $specification = Specification::where('key', '=', 'S_PI')->get()->first();

        $contract = new Contract();
        $contract_property = new ContractProperty();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_INDIVIDUAL;
        }
        if (isset($old_data['properties'])) {
            foreach ($old_data['properties'] as $item) {
                $contract_property->properties[] = new Property();
            }
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('products.dobrovolka_imushestvo.form', [
            'beneficiary' => new Beneficiary(),
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_property' => $contract_property,
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
            ContractProperty::$validate,
            [
                'policy.name' => 'required',
                'policy.series' => 'required',
                'policy.date_of_issue' => 'required',
                'policy.polis_from_date' => 'required',
                'policy.polis_to_date' => 'required',
                'policy.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policy.franchise' => ['required', 'numeric', 'min:0'],

                'properties.*.name' => 'required',
                'properties.*.location' => 'required',
                'properties.*.quantity' => ['nullable', 'numeric', 'min:0'],
                'properties.*.insurance_value' => ['required', 'numeric', 'min:0'],
                'properties.*.insurance_sum' => ['required', 'numeric', 'min:0'],

                'tranches.*.sum' => ['required', 'numeric', 'min:0'],
                'tranches.*.from' => 'required',
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
        $contract_property = ContractProperty::create([]);

        $contract_data = $request['contract'];
        $contract_data['beneficiary_id'] = $beneficiary->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractProperty::class;
        $contract_data['model_id'] = $contract_property->id;

        $contract = Contract::create($contract_data);

        $policy_data['contract_id'] = $contract->id;

        $policy->fill($policy_data);
        $policy->save();

        if ($request['properties']) {
            $contract_property->properties()->createMany($request['properties']);
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
     * @param  \App\Model\Contract $dobrovolka_imushestvo
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $dobrovolka_imushestvo)
    {
        $contract = $dobrovolka_imushestvo;

        return view('products.dobrovolka_imushestvo.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_property' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $dobrovolka_imushestvo
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $dobrovolka_imushestvo)
    {
        $contract = $dobrovolka_imushestvo;

        return view('products.dobrovolka_imushestvo.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_property' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $dobrovolka_imushestvo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $dobrovolka_imushestvo)
    {
        $request->validate(array_merge(
            Beneficiary::$validate,
            Client::$validate,
            Contract::$validate,
            ContractProperty::$validate,
            [
                'policy.name' => 'required',
                'policy.series' => 'required',
                'policy.date_of_issue' => 'required',
                'policy.polis_from_date' => 'required',
                'policy.polis_to_date' => 'required',
                'policy.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policy.franchise' => ['required', 'numeric', 'min:0'],

                'properties.*.name' => 'required',
                'properties.*.location' => 'required',
                'properties.*.quantity' => ['nullable', 'numeric', 'min:0'],
                'properties.*.insurance_value' => ['required', 'numeric', 'min:0'],
                'properties.*.insurance_sum' => ['required', 'numeric', 'min:0'],

                'tranches.*.sum' => ['required', 'numeric', 'min:0'],
                'tranches.*.from' => 'required',
            ]
        ));

        $contract = $dobrovolka_imushestvo;

        $beneficiary = $contract->beneficiary;
        $beneficiary->fill($request['beneficiary']);
        $beneficiary->save();

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_property = $contract->contract_model;
        $contract_property->fill([]);
        $contract_property->save();

        $contract->fill($request['contract']);
        $contract->save();

        $policy = $contract->policies->first();
        $policy->fill($request['policy']);
        $policy->save();

        if ($request['properties']) {
            $properties_ids = [];

            foreach($request['properties'] as $property_data) {
                $property = Property::where('model_type', '=', ContractProperty::class)
                                    ->where('model_id', '=', $contract_property->id)
                                    ->where('name', '=', $property_data['name'])
                                    ->where('location', '=', $property_data['location'])
                                    ->get()
                                    ->first();

                if ($property) {
                    $property->fill($property_data);
                    $property->save();
                } else {
                    $property_data['model_type'] = ContractProperty::class;
                    $property_data['model_id'] = $contract_property->id;

                    $property = Property::create($property_data);
                }

                $properties_ids[] = $property->id;
            }

            $properties = Property::where('model_type', '=', ContractProperty::class)
                                  ->where('model_id', '=', $contract_property->id)
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
     * @param  \App\Model\Contract $dobrovolka_imushestvo
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $dobrovolka_imushestvo)
    {
        $contract = $dobrovolka_imushestvo;

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
