<?php

namespace App\Http\Controllers\Product;

use App\AllProduct;
use App\AllProductInformation;
use App\AllProductsTermsTransh;
use App\Http\Controllers\Controller;
use App\Model\Beneficiary;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractAutoleasing;
use App\Model\Policy;
use App\Model\PolicyAutoleasing;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LizingTsController extends Controller
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

        $specification = Specification::where('key', '=', 'S_LVI')->get()->first();

        $contract = new Contract();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_INDIVIDUAL;
        }
        if (isset($old_data['policies'])) {
            foreach ($old_data['policies'] as $item) {
                $policy = new Policy();
                $policy->policy_model = new PolicyAutoleasing();

                $contract->policies[] = $policy;
            }
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('products.lizing_ts.form', [
            'beneficiary' => new Beneficiary(),
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_autoleasing' => new ContractAutoleasing(),
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
            ContractAutoleasing::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policies.*.franchise' => ['required', 'numeric', 'min:0'],

                'policies.*.policy_autoleasing.issue_year' => 'required',
                'policies.*.policy_autoleasing.brand' => 'required',
                'policies.*.policy_autoleasing.model' => 'required',
                'policies.*.policy_autoleasing.government_number' => 'required',
                'policies.*.policy_autoleasing.techpassport_number' => 'required',
                'policies.*.policy_autoleasing.engine_number' => 'required',
                'policies.*.policy_autoleasing.carcase_number' => 'required',
                'policies.*.policy_autoleasing.insurance_value' => ['required', 'numeric', 'min:0'],

                'tranches.*.sum' => ['required', 'numeric', 'min:0'],
                'tranches.*.from' => 'required',
            ]
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

        $beneficiary = Beneficiary::create($request['beneficiary']);
        $client = Client::create($request['client']);
        $contract_autoleasing = ContractAutoleasing::create($request['contract_autoleasing']);

        $contract_data = $request['contract'];
        $contract_data['beneficiary_id'] = $beneficiary->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractAutoleasing::class;
        $contract_data['model_id'] = $contract_autoleasing->id;

        $contract = Contract::create($contract_data);

        foreach($policies_data as $policy_data) {
            $policy = Policy::where('name', '=', $policy_data['name'])
                            ->where('series', '=', $policy_data['series'])
                            ->get()
                            ->first();

            if ($policy) {
                $policy_autoleasing = PolicyAutoleasing::create($policy_data['policy_autoleasing']);

                unset($policy_data['policy_autoleasing']);

                $policy_data['contract_id'] = $contract->id;
                $policy_data['model_type'] = PolicyAutoleasing::class;
                $policy_data['model_id'] = $policy_autoleasing->id;

                $policy->fill($policy_data);
                $policy->save();
            }
        }

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file) {
                $files[] = [
                    'type' => $type,
                    'original_name' => $file->getClientOriginalName(),
                    'path' => Storage::putFile('public/contract', $file),
                ];
            }
        }

        $contract->files()->createMany($files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено сохранение контракта');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $lizing_t
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $lizing_t)
    {
        $contract = $lizing_t;

        return view('products.lizing_ts.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_autoleasing' => $contract->contract_model,
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $lizing_t
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $lizing_t)
    {
        $contract = $lizing_t;

        return view('products.lizing_ts.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_autoleasing' => $contract->contract_model,
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $lizing_t
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $lizing_t)
    {
        $request->validate(array_merge(
            Beneficiary::$validate,
            Client::$validate,
            Contract::$validate,
            ContractAutoleasing::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policies.*.franchise' => ['required', 'numeric', 'min:0'],

                'policies.*.policy_autoleasing.issue_year' => 'required',
                'policies.*.policy_autoleasing.brand' => 'required',
                'policies.*.policy_autoleasing.model' => 'required',
                'policies.*.policy_autoleasing.government_number' => 'required',
                'policies.*.policy_autoleasing.techpassport_number' => 'required',
                'policies.*.policy_autoleasing.engine_number' => 'required',
                'policies.*.policy_autoleasing.carcase_number' => 'required',
                'policies.*.policy_autoleasing.insurance_value' => ['required', 'numeric', 'min:0'],

                'tranches.*.sum' => ['required', 'numeric', 'min:0'],
                'tranches.*.from' => 'required',
            ]
        ));

        $contract = $lizing_t;

        $beneficiary = $contract->beneficiary;
        $beneficiary->fill($request['beneficiary']);
        $beneficiary->save();

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_autoleasing = $contract->contract_model;
        $contract_autoleasing->fill($request['contract_autoleasing']);
        $contract_autoleasing->save();

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
                    $policy_autoleasing = $policy->policy_model;
                    $policy_autoleasing->fill($policy_data['policy_autoleasing']);
                    $policy_autoleasing->save();

                    unset($policy_data['policy_autoleasing']);

                    $policy->fill($policy_data);
                    $policy->save();
                } else {
                    $policy = Policy::where('name', '=', $policy_data['name'])
                                    ->where('series', '=', $policy_data['series'])
                                    ->get()
                                    ->first();

                    if ($policy) {
                        $policy_autoleasing = PolicyAutoleasing::create($policy_data['policy_autoleasing']);

                        unset($policy_data['policy_autoleasing']);

                        $policy_data['contract_id'] = $contract->id;
                        $policy_data['model_type'] = PolicyAutoleasing::class;
                        $policy_data['model_id'] = $policy_autoleasing->id;

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

        $files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file) {
                if ($old_file = $contract->getFile($type)) {
                    $old_file->delete();
                }

                $files[] = [
                    'type' => $type,
                    'original_name' => $file->getClientOriginalName(),
                    'path' => Storage::putFile('public/contract', $file),
                ];
            }
        }

        $contract->files()->createMany($files);

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено изменение контракта');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $lizing_t
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $lizing_t)
    {
        $contract = $lizing_t;

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
