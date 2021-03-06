<?php

namespace App\Http\Controllers;

use App\AllProduct;
use App\AllProductInformation;
use App\AllProductsTermsTransh;
use App\Model\Borrower;
use App\Model\Contract;
use App\Model\ContractConsumerCredit;
use App\Model\Client;
use App\Model\Employee;
use App\Model\Policy;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Zaemshik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PotrebKreditController extends Controller
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

        $specification = Specification::where('key', '=', 'S_CLNRRI')->get()->first();

        $contract = new Contract();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = request('type', Contract::TYPE_LEGAL);
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('credit.form', [
            'block' => false,
            'borrower' => new Borrower(),
            'client' => new Client(),
            'contract' => $contract,
            'contract_consumer_credit' => new ContractConsumerCredit(),
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
            ContractConsumerCredit::$validate,
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
                    '?? ???????? ???? ?????????????????? ?????????? ?? %s ?????????????????????? ?? ?? %s ????????????',
                    $policy_data['name'],
                    $policy_data['series']
                )
            ]);
        }

        $borrower = Borrower::create($request['borrower']);
        $client = Client::create($request['client']);
        $contract_consumer_credit = ContractConsumerCredit::create($request['contract_consumer_credit']);

        $contract_data = $request['contract'];
        $contract_data['borrower_id'] = $borrower->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractConsumerCredit::class;
        $contract_data['model_id'] = $contract_consumer_credit->id;

        $contract = Contract::create($contract_data);

        $policy_data['contract_id'] = $contract->id;

        $policy->fill($policy_data);
        $policy->save();

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $contract_consumer_credit_file_types = [
            ContractConsumerCredit::FILE_CONSUMER_LOAN_AGREEMENT,
            ContractConsumerCredit::FILE_DOCUMENT,
            ContractConsumerCredit::FILE_EMPLOYMENT_CERTIFICATE,
            ContractConsumerCredit::FILE_PASSPORT,
            ContractConsumerCredit::FILE_RESIDENCE_CERTIFICATE,
        ];

        $contract_files = [];
        $contract_consumer_credit_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, $contract_consumer_credit_file_types)) {
                    $file_collection = is_array($file_collection) ? $file_collection : [$file_collection];

                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        $contract_consumer_credit_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_consumer_credit', $file_item),
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
        $contract_consumer_credit->files()->createMany($contract_consumer_credit_files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', '?????????????? ?????????????????????? ???????????????????? ??????????????????');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $potrebkredit
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $potrebkredit)
    {
        $contract = $potrebkredit;

        return view('credit.form', [
            'block' => true,
            'borrower' => $contract->borrower,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_consumer_credit' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $potrebkredit
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $potrebkredit)
    {
        $contract = $potrebkredit;

        return view('credit.form', [
            'block' => false,
            'borrower' => $contract->borrower,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_consumer_credit' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $potrebkredit
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $potrebkredit)
    {
        $request->validate(array_merge(
            Borrower::$validate,
            Client::$validate,
            Contract::$validate,
            ContractConsumerCredit::$validate,
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

        $contract = $potrebkredit;

        $borrower = $contract->borrower;
        $borrower->fill($request['borrower']);
        $borrower->save();

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_consumer_credit = $contract->contract_model;
        $contract_consumer_credit->fill($request['contract_consumer_credit']);
        $contract_consumer_credit->save();

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

        $contract_consumer_credit_file_types = [
            ContractConsumerCredit::FILE_CONSUMER_LOAN_AGREEMENT,
            ContractConsumerCredit::FILE_DOCUMENT,
            ContractConsumerCredit::FILE_EMPLOYMENT_CERTIFICATE,
            ContractConsumerCredit::FILE_PASSPORT,
            ContractConsumerCredit::FILE_RESIDENCE_CERTIFICATE,
        ];

        $contract_files = [];
        $contract_consumer_credit_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, $contract_consumer_credit_file_types)) {
                    $file_collection = is_array($file_collection) ? $file_collection : [$file_collection];

                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        foreach($contract_consumer_credit->getFiles($type) as $old_file) {
                            $old_file->delete();
                        }

                        $contract_consumer_credit_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_consumer_credit', $file_item),
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
        $contract_consumer_credit->files()->createMany($contract_consumer_credit_files);

        return redirect()->route('contracts.index')
                         ->with('success', '?????????????? ?????????????????????? ?????????????????? ??????????????????');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $potrebkredit
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $potrebkredit)
    {
        $contract = $potrebkredit;

        if ($policy = $contract->policies->first()) {
            $policy->delete();
        }
        $contract->delete();

        return redirect()->route('contracts.index')
                         ->with('success', sprintf('???????????? ?? ?????????????????? \'%s\' ???????? ?????????????? ??????????????', $contract->number));
    }
}
