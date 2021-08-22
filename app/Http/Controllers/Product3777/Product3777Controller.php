<?php

namespace App\Http\Controllers\Product3777;

use App\AllProduct;
use App\Http\Controllers\Controller;
use App\Model\Borrower;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractFamilyIsEntrepreneur;
use App\Model\Policy;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Bank;
use App\Product3777;
use App\Zaemshik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mnvx\EloquentPrintForm\PrintFormProcessor;

class Product3777Controller extends Controller
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

        $specification = Specification::where('key', '=', 'S_IOTRONOTLU')->get()->first();

        $contract = new Contract();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_INDIVIDUAL;
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('products.product3777.form', [
            'block' => false,
            'borrower' => new Borrower(),
            'client' => new Client(),
            'contract' => $contract,
            'contract_family_is_entrepreneur' => new ContractFamilyIsEntrepreneur(),
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
            Borrower::$validate,
            Client::$validate,
            Contract::$validate,
            ContractFamilyIsEntrepreneur::$validate,
            [
                'policy.name' => 'required',
                'policy.series' => 'required',
                'policy.date_of_issue' => 'required',
                'policy.polis_from_date' => 'required',
                'policy.polis_to_date' => 'required',
                'policy.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policy.franchise' => ['required', 'numeric', 'min:0'],

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

        $borrower = Borrower::create($request['borrower']);
        $client = Client::create($request['client']);
        $contract_family_is_entrepreneur = ContractFamilyIsEntrepreneur::create($request['contract_family_is_entrepreneur']);

        $contract_data = $request['contract'];
        $contract_data['borrower_id'] = $borrower->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractFamilyIsEntrepreneur::class;
        $contract_data['model_id'] = $contract_family_is_entrepreneur->id;

        $contract = Contract::create($contract_data);

        $policy_data['contract_id'] = $contract->id;

        $policy->fill($policy_data);
        $policy->save();

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $contract_family_is_entrepreneur_file_types = [
            ContractFamilyIsEntrepreneur::FILE_CERTIFICATE,
            ContractFamilyIsEntrepreneur::FILE_CONTRACT,
            ContractFamilyIsEntrepreneur::FILE_OTHER_DOCUMENT,
            ContractFamilyIsEntrepreneur::FILE_PASSPORT,
        ];

        $contract_files = [];
        $contract_family_is_entrepreneur_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file) {
                if (in_array($type, $contract_family_is_entrepreneur_file_types)) {
                    $contract_family_is_entrepreneur_files[] = [
                        'type' => $type,
                        'original_name' => $file->getClientOriginalName(),
                        'path' => Storage::putFile('public/contract_family_is_entrepreneur', $file),
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
        $contract_family_is_entrepreneur->files()->createMany($contract_family_is_entrepreneur_files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено сохранение контракта');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $product3777
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $product3777)
    {
        $contract = $product3777;

        return view('products.product3777.form', [
            'block' => true,
            'borrower' => $contract->borrower,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_family_is_entrepreneur' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $product3777
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $product3777)
    {
        $contract = $product3777;

        return view('products.product3777.form', [
            'block' => false,
            'borrower' => $contract->borrower,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_family_is_entrepreneur' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $product3777
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $product3777)
    {
        $request->validate(array_merge(
            Borrower::$validate,
            Client::$validate,
            Contract::$validate,
            ContractFamilyIsEntrepreneur::$validate,
            [
                'policy.name' => 'required',
                'policy.series' => 'required',
                'policy.date_of_issue' => 'required',
                'policy.polis_from_date' => 'required',
                'policy.polis_to_date' => 'required',
                'policy.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policy.franchise' => ['required', 'numeric', 'min:0'],

                'tranches.*.sum' => ['required', 'numeric', 'min:0'],
                'tranches.*.from' => 'required',
            ]
        ));

        $contract = $product3777;

        $borrower = $contract->borrower;
        $borrower->fill($request['borrower']);
        $borrower->save();

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_family_is_entrepreneur = $contract->contract_model;
        $contract_family_is_entrepreneur->fill($request['contract_family_is_entrepreneur']);
        $contract_family_is_entrepreneur->save();

        $contract->fill($request['contract']);
        $contract->save();

        $policy = $contract->policies->first();
        $policy->fill($request['policy']);
        $policy->save();

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

        $contract_family_is_entrepreneur_file_types = [
            ContractFamilyIsEntrepreneur::FILE_CERTIFICATE,
            ContractFamilyIsEntrepreneur::FILE_CONTRACT,
            ContractFamilyIsEntrepreneur::FILE_OTHER_DOCUMENT,
            ContractFamilyIsEntrepreneur::FILE_PASSPORT,
        ];

        $contract_files = [];
        $contract_family_is_entrepreneur_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file) {
                if (in_array($type, $contract_family_is_entrepreneur_file_types)) {
                    if ($old_file = $contract_family_is_entrepreneur->getFile($type)) {
                        $old_file->delete();
                    }

                    $contract_family_is_entrepreneur_files[] = [
                        'type' => $type,
                        'original_name' => $file->getClientOriginalName(),
                        'path' => Storage::putFile('public/contract_family_is_entrepreneur', $file),
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
        $contract_family_is_entrepreneur->files()->createMany($contract_family_is_entrepreneur_files);

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено изменение контракта');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $product3777
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $product3777)
    {
        $contract = $product3777;

        if ($policy = $contract->policies->first()) {
            $policy->delete();
        }
        $contract->delete();

        return redirect()->route('contracts.index')
                         ->with('success', sprintf('Данные о контракте \'%s\' были успешно удалены', $contract->number));
    }
}
