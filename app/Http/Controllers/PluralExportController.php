<?php

namespace App\Http\Controllers;

use App\AllProduct;
use App\AllProductInformation;
use App\AllProductsTermsTransh;
use App\Buyer;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractPluralExportCargo;
use App\Model\Customer;
use App\Model\Employee;
use App\Model\Guarantor;
use App\Model\Policy;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Poruchitel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PluralExportController extends Controller
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

        $specification = Specification::where('key', '=', 'S_CIG')->get()->first();

        $contract = new Contract();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = request('type', Contract::TYPE_INDIVIDUAL);
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('plural-export-gruz.form', [
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_plural_export_cargo' => new ContractPluralExportCargo(),
            'customer' => new Customer(),
            'guarantor' => new Guarantor(),
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
            Client::$validate,
            Contract::$validate,
            ContractPluralExportCargo::$validate,
            Customer::$validate,
            Guarantor::$validate,
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

        $client = Client::create($request['client']);
        $customer = Customer::create($request['customer']);
        $guarantor = Guarantor::create($request['guarantor']);

        $contract_plural_export_cargo_data = $request['contract_plural_export_cargo'];
        $contract_plural_export_cargo_data['is_no_disputes']            = isset($contract_plural_export_cargo_data['is_no_disputes'])           ? 1 : 0;
        $contract_plural_export_cargo_data['is_no_commit']              = isset($contract_plural_export_cargo_data['is_no_commit'])             ? 1 : 0;
        $contract_plural_export_cargo_data['is_follow']                 = isset($contract_plural_export_cargo_data['is_follow'])                ? 1 : 0;
        $contract_plural_export_cargo_data['is_guarantee']              = isset($contract_plural_export_cargo_data['is_guarantee'])             ? 1 : 0;
        $contract_plural_export_cargo_data['is_paid_to_policyholder']   = isset($contract_plural_export_cargo_data['is_paid_to_policyholder'])  ? 1 : 0;
        $contract_plural_export_cargo_data['is_an_obligation']          = isset($contract_plural_export_cargo_data['is_an_obligation'])         ? 1 : 0;
        $contract_plural_export_cargo_data['is_agree_to_provide_info']  = isset($contract_plural_export_cargo_data['is_agree_to_provide_info']) ? 1 : 0;
        $contract_plural_export_cargo_data['is_completed_sales']        = isset($contract_plural_export_cargo_data['is_completed_sales'])       ? 1 : 0;
        $contract_plural_export_cargo_data['is_extended_changed']       = isset($contract_plural_export_cargo_data['is_extended_changed'])      ? 1 : 0;
        $contract_plural_export_cargo_data['is_have_info']              = isset($contract_plural_export_cargo_data['is_have_info'])             ? 1 : 0;
        $contract_plural_export_cargo_data['is_have_ensuring_forms']    = isset($contract_plural_export_cargo_data['is_have_ensuring_forms'])   ? 1 : 0;
        $contract_plural_export_cargo_data['is_required']               = isset($contract_plural_export_cargo_data['is_required'])              ? 1 : 0;
        $contract_plural_export_cargo_data['is_received']               = isset($contract_plural_export_cargo_data['is_received'])              ? 1 : 0;

        if ($contract_plural_export_cargo_data['is_completed_sales']) {
            $contract_plural_export_cargo_data['completed_sales_reason'] = '';
        }
        if ($contract_plural_export_cargo_data['is_have_ensuring_forms']) {
            $contract_plural_export_cargo_data['is_required'] = 0;
            $contract_plural_export_cargo_data['is_received'] = 0;
        }

        $contract_plural_export_cargo = ContractPluralExportCargo::create($contract_plural_export_cargo_data);

        $contract_data = $request['contract'];
        $contract_data['client_id'] = $client->id;
        $contract_data['customer_id'] = $customer->id;
        $contract_data['guarantor_id'] = $guarantor->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractPluralExportCargo::class;
        $contract_data['model_id'] = $contract_plural_export_cargo->id;

        $contract = Contract::create($contract_data);

        $policy_data['contract_id'] = $contract->id;

        $policy->fill($policy_data);
        $policy->save();

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $contract_plural_export_cargo_file_types = [
            ContractPluralExportCargo::FILE_ANOTHER_LOSS_DOCUMENT,
            ContractPluralExportCargo::FILE_BANK_STATEMENT,
            ContractPluralExportCargo::FILE_CORRESPONDENCE,
            ContractPluralExportCargo::FILE_INVOICE,
            ContractPluralExportCargo::FILE_PAYMENT_DOCUMENT,
            ContractPluralExportCargo::FILE_PAYMENT_REQUEST_DOCUMENT,
            ContractPluralExportCargo::FILE_SALES_LEDGER,
            ContractPluralExportCargo::FILE_UNPAID_INVOICE,
            ContractPluralExportCargo::FILE_WARRANTY_DOCUMENT,
        ];

        $contract_files = [];
        $contract_plural_export_cargo_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, $contract_plural_export_cargo_file_types)) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        $contract_plural_export_cargo_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_plural_export_cargo', $file_item),
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
        $contract_plural_export_cargo->files()->createMany($contract_plural_export_cargo_files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено сохранение контракта');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $plural_export
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $plural_export)
    {
        $contract = $plural_export;

        return view('plural-export-gruz.form', [
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_plural_export_cargo' => $contract->contract_model,
            'customer' => $contract->customer,
            'guarantor' => $contract->guarantor,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $plural_export
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $plural_export)
    {
        $contract = $plural_export;

        return view('plural-export-gruz.form', [
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_plural_export_cargo' => $contract->contract_model,
            'customer' => $contract->customer,
            'guarantor' => $contract->guarantor,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $plural_export
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $plural_export)
    {
        $request->validate(array_merge(
            Client::$validate,
            Contract::$validate,
            ContractPluralExportCargo::$validate,
            Customer::$validate,
            Guarantor::$validate,
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

        $contract = $plural_export;

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $customer = $contract->customer;
        $customer->fill($request['customer']);
        $customer->save();

        $guarantor = $contract->guarantor;
        $guarantor->fill($request['guarantor']);
        $guarantor->save();

        $contract_plural_export_cargo_data = $request['contract_plural_export_cargo'];
        $contract_plural_export_cargo_data['is_no_disputes']            = isset($contract_plural_export_cargo_data['is_no_disputes'])           ? 1 : 0;
        $contract_plural_export_cargo_data['is_no_commit']              = isset($contract_plural_export_cargo_data['is_no_commit'])             ? 1 : 0;
        $contract_plural_export_cargo_data['is_follow']                 = isset($contract_plural_export_cargo_data['is_follow'])                ? 1 : 0;
        $contract_plural_export_cargo_data['is_guarantee']              = isset($contract_plural_export_cargo_data['is_guarantee'])             ? 1 : 0;
        $contract_plural_export_cargo_data['is_paid_to_policyholder']   = isset($contract_plural_export_cargo_data['is_paid_to_policyholder'])  ? 1 : 0;
        $contract_plural_export_cargo_data['is_an_obligation']          = isset($contract_plural_export_cargo_data['is_an_obligation'])         ? 1 : 0;
        $contract_plural_export_cargo_data['is_agree_to_provide_info']  = isset($contract_plural_export_cargo_data['is_agree_to_provide_info']) ? 1 : 0;
        $contract_plural_export_cargo_data['is_completed_sales']        = isset($contract_plural_export_cargo_data['is_completed_sales'])       ? 1 : 0;
        $contract_plural_export_cargo_data['is_extended_changed']       = isset($contract_plural_export_cargo_data['is_extended_changed'])      ? 1 : 0;
        $contract_plural_export_cargo_data['is_have_info']              = isset($contract_plural_export_cargo_data['is_have_info'])             ? 1 : 0;
        $contract_plural_export_cargo_data['is_have_ensuring_forms']    = isset($contract_plural_export_cargo_data['is_have_ensuring_forms'])   ? 1 : 0;
        $contract_plural_export_cargo_data['is_required']               = isset($contract_plural_export_cargo_data['is_required'])              ? 1 : 0;
        $contract_plural_export_cargo_data['is_received']               = isset($contract_plural_export_cargo_data['is_received'])              ? 1 : 0;

        if ($contract_plural_export_cargo_data['is_completed_sales']) {
            $contract_plural_export_cargo_data['completed_sales_reason'] = '';
        }
        if ($contract_plural_export_cargo_data['is_have_ensuring_forms']) {
            $contract_plural_export_cargo_data['is_required'] = 0;
            $contract_plural_export_cargo_data['is_received'] = 0;
        }

        $contract_plural_export_cargo = $contract->contract_model;
        $contract_plural_export_cargo->fill($contract_plural_export_cargo_data);
        $contract_plural_export_cargo->save();

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

        $contract_plural_export_cargo_file_types = [
            ContractPluralExportCargo::FILE_ANOTHER_LOSS_DOCUMENT,
            ContractPluralExportCargo::FILE_BANK_STATEMENT,
            ContractPluralExportCargo::FILE_CORRESPONDENCE,
            ContractPluralExportCargo::FILE_INVOICE,
            ContractPluralExportCargo::FILE_PAYMENT_DOCUMENT,
            ContractPluralExportCargo::FILE_PAYMENT_REQUEST_DOCUMENT,
            ContractPluralExportCargo::FILE_SALES_LEDGER,
            ContractPluralExportCargo::FILE_UNPAID_INVOICE,
            ContractPluralExportCargo::FILE_WARRANTY_DOCUMENT,
        ];

        $contract_files = [];
        $contract_plural_export_cargo_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, $contract_plural_export_cargo_file_types)) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        foreach($contract_plural_export_cargo->getFiles($type) as $old_file) {
                            $old_file->delete();
                        }

                        $contract_plural_export_cargo_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_plural_export_cargo', $file_item),
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
        $contract_plural_export_cargo->files()->createMany($contract_plural_export_cargo_files);

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено изменение контракта');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $plural_export
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $plural_export)
    {
        $contract = $plural_export;

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
