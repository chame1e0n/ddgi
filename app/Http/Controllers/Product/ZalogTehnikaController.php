<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ZalogTehnikaRequest;
use App\Model\Beneficiary;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractSpecialEquipmentPledge;
use App\Model\Pledger;
use App\Model\Policy;
use App\Model\Property;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\Allproduct;
use App\Models\AllProductImushestvoInfo;
use App\Models\AllProductsTermsTranshes;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Zalogodatel;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ZalogTehnikaController extends Controller
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

        $specification = Specification::where('key', '=', 'S_IOSEPUAAP')->get()->first();

        $contract = new Contract();
        $contract_special_equipment_pledge = new ContractSpecialEquipmentPledge();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = request('type', Contract::TYPE_INDIVIDUAL);
        }
        if (isset($old_data['properties'])) {
            foreach ($old_data['properties'] as $item) {
                $contract_special_equipment_pledge->properties[] = new Property();
            }
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('products.zalog.tehnika.form', [
            'beneficiary' => new Beneficiary(),
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_special_equipment_pledge' => $contract_special_equipment_pledge,
            'pledger' => new Pledger(),
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
            ContractSpecialEquipmentPledge::$validate,
            Pledger::$validate,
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
        $pledger = Pledger::create($request['pledger']);
        $contract_special_equipment_pledge = ContractSpecialEquipmentPledge::create($request['contract_special_equipment_pledge']);

        $contract_data = $request['contract'];
        $contract_data['beneficiary_id'] = $beneficiary->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['pledger_id'] = $pledger->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractSpecialEquipmentPledge::class;
        $contract_data['model_id'] = $contract_special_equipment_pledge->id;

        $contract = Contract::create($contract_data);

        $policy_data['contract_id'] = $contract->id;

        $policy->fill($policy_data);
        $policy->save();

        if ($request['properties']) {
            $contract_special_equipment_pledge->properties()->createMany($request['properties']);
        }

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $contract_files = [];
        $contract_special_equipment_pledge_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file) {
                if (in_array($type, [ContractSpecialEquipmentPledge::FILE_FIRE_CERTIFICATE, ContractSpecialEquipmentPledge::FILE_SECURITY_CERTIFICATE])) {
                    $contract_special_equipment_pledge_files[] = [
                        'type' => $type,
                        'original_name' => $file->getClientOriginalName(),
                        'path' => Storage::putFile('public/contract_special_equipment_pledge', $file),
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
        $contract_special_equipment_pledge->files()->createMany($contract_special_equipment_pledge_files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено сохранение контракта');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $zalog_tehnika
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $zalog_tehnika)
    {
        $contract = $zalog_tehnika;

        return view('products.zalog.tehnika.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_special_equipment_pledge' => $contract->contract_model,
            'pledger' => $contract->pledger,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $zalog_tehnika
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $zalog_tehnika)
    {
        $contract = $zalog_tehnika;

        return view('products.zalog.tehnika.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_special_equipment_pledge' => $contract->contract_model,
            'pledger' => $contract->pledger,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $zalog_tehnika
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $zalog_tehnika)
    {
        $request->validate(array_merge(
            Beneficiary::$validate,
            Client::$validate,
            Contract::$validate,
            ContractSpecialEquipmentPledge::$validate,
            Pledger::$validate,
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

        $contract = $zalog_tehnika;

        $beneficiary = $contract->beneficiary;
        $beneficiary->fill($request['beneficiary']);
        $beneficiary->save();

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $pledger = $contract->pledger;
        $pledger->fill($request['pledger']);
        $pledger->save();

        $contract_special_equipment_pledge = $contract->contract_model;
        $contract_special_equipment_pledge->fill($request['contract_special_equipment_pledge']);
        $contract_special_equipment_pledge->save();

        $contract->fill($request['contract']);
        $contract->save();

        $policy = $contract->policies->first();
        $policy->fill($request['policy']);
        $policy->save();

        if ($request['properties']) {
            $properties_ids = [];

            foreach($request['properties'] as $property_data) {
                $property = Property::where('model_type', '=', ContractSpecialEquipmentPledge::class)
                                    ->where('model_id', '=', $contract_special_equipment_pledge->id)
                                    ->where('name', '=', $property_data['name'])
                                    ->where('location', '=', $property_data['location'])
                                    ->get()
                                    ->first();

                if ($property) {
                    $property->fill($property_data);
                    $property->save();
                } else {
                    $property_data['model_type'] = ContractSpecialEquipmentPledge::class;
                    $property_data['model_id'] = $contract_special_equipment_pledge->id;

                    $property = Property::create($property_data);
                }

                $properties_ids[] = $property->id;
            }

            $properties = Property::where('model_type', '=', ContractSpecialEquipmentPledge::class)
                                  ->where('model_id', '=', $contract_special_equipment_pledge->id)
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
        $contract_special_equipment_pledge_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file) {
                if (in_array($type, [ContractSpecialEquipmentPledge::FILE_FIRE_CERTIFICATE, ContractSpecialEquipmentPledge::FILE_SECURITY_CERTIFICATE])) {
                    if ($old_file = $contract_special_equipment_pledge->getFile($type)) {
                        $old_file->delete();
                    }

                    $contract_special_equipment_pledge_files[] = [
                        'type' => $type,
                        'original_name' => $file->getClientOriginalName(),
                        'path' => Storage::putFile('public/contract_special_equipment_pledge', $file),
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
        $contract_special_equipment_pledge->files()->createMany($contract_special_equipment_pledge_files);

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено изменение контракта');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $zalog_tehnika
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $zalog_tehnika)
    {
        $contract = $zalog_tehnika;

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
