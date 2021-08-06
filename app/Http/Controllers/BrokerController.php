<?php

namespace App\Http\Controllers;

use App\AllProduct;
use App\AllProductInformation;
use App\AllProductInformationTransport;
use App\AllProductsTermsTransh;
use App\Helpers\Convertio\Convertio;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractCustomOfficer;
use App\Model\Employee;
use App\Model\Policy;
use App\Model\PolicyCustomOfficer;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;

class BrokerController extends Controller
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

        $specification = Specification::where('key', '=', 'S_PLIOCB')->get()->first();

        $contract = new Contract();
        $contract_custom_officer = new ContractCustomOfficer();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_LEGAL;
        }
        if (isset($old_data['policies'])) {
            foreach ($old_data['policies'] as $key => $item) {
                $policy = new Policy();
                $policy->policy_model = new PolicyCustomOfficer();

                $contract->policies[$key] = $policy;
            }
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('products.otvetstvennost.broker.form', [
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_custom_officer' => $contract_custom_officer,
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
            ContractCustomOfficer::$validate,
            [
                'tranches.*.sum' => 'required',
                'tranches.*.from' => 'required',

                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.polis_from_date' => 'required',
                'policies.*.polis_to_date' => 'required',
                'policies.*.insurance_sum' => 'required',
                'policies.*.franchise' => 'required',

                'policies.*.policy_custom_officer.fio' => 'required',
                'policies.*.policy_custom_officer.speciality' => 'required',
                'policies.*.policy_custom_officer.work_experience' => 'required',
                'policies.*.policy_custom_officer.position' => 'required',
                'policies.*.policy_custom_officer.start_date' => 'required',
                'policies.*.policy_custom_officer.insurance_value' => 'required',
            ],
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

        $client = Client::create($request['client']);
        $contract_custom_officer = ContractCustomOfficer::create($request['contract_custom_officer']);

        $contract_data = $request['contract'];
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractCustomOfficer::class;
        $contract_data['model_id'] = $contract_custom_officer->id;

        $contract = Contract::create($contract_data);

        foreach($policies_data as $policy_data) {
            $policy = Policy::where('name', '=', $policy_data['name'])
                            ->where('series', '=', $policy_data['series'])
                            ->get()
                            ->first();

            if ($policy) {
                $policy_custom_officer = PolicyCustomOfficer::create($policy_data['policy_custom_officer']);

                unset($policy_data['policy_custom_officer']);

                $policy_data['contract_id'] = $contract->id;
                $policy_data['model_type'] = PolicyCustomOfficer::class;
                $policy_data['model_id'] = $policy_custom_officer->id;

                $policy->fill($policy_data);
                $policy->save();
            }
        }

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $contract_files = [];
        $contract_custom_officer_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, [ContractCustomOfficer::FILE_DOCUMENT])) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        $contract_custom_officer_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_custom_officer', $file_item),
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
        $contract_custom_officer->files()->createMany($contract_custom_officer_files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено сохранение контракта');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $broker
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $broker)
    {
        $contract = $broker;

        return view('products.otvetstvennost.broker.form', [
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_custom_officer' => $contract->contract_model,
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $broker
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $broker)
    {
        $contract = $broker;

        return view('products.otvetstvennost.broker.form', [
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_custom_officer' => $contract->contract_model,
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $broker
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $broker)
    {
        $request->validate(array_merge(
            Client::$validate,
            Contract::$validate,
            ContractCustomOfficer::$validate,
            [
                'tranches.*.sum' => 'required',
                'tranches.*.from' => 'required',

                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.polis_from_date' => 'required',
                'policies.*.polis_to_date' => 'required',
                'policies.*.insurance_sum' => 'required',
                'policies.*.franchise' => 'required',

                'policies.*.policy_custom_officer.fio' => 'required',
                'policies.*.policy_custom_officer.speciality' => 'required',
                'policies.*.policy_custom_officer.work_experience' => 'required',
                'policies.*.policy_custom_officer.position' => 'required',
                'policies.*.policy_custom_officer.start_date' => 'required',
                'policies.*.policy_custom_officer.insurance_value' => 'required',
            ],
        ));

        $contract = $broker;

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_custom_officer = $contract->contract_model;
        $contract_custom_officer->fill($request['contract_custom_officer']);
        $contract_custom_officer->save();

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
                    $policy_custom_officer = $policy->policy_model;
                    $policy_custom_officer->fill($policy_data['policy_custom_officer']);
                    $policy_custom_officer->save();

                    unset($policy_data['policy_custom_officer']);

                    $policy->fill($policy_data);
                    $policy->save();
                } else {
                    $policy = Policy::where('name', '=', $policy_data['name'])
                                    ->where('series', '=', $policy_data['series'])
                                    ->get()
                                    ->first();

                    if ($policy) {
                        $policy_custom_officer = PolicyCustomOfficer::create($policy_data['policy_custom_officer']);

                        unset($policy_data['policy_custom_officer']);

                        $policy_data['contract_id'] = $contract->id;
                        $policy_data['model_type'] = PolicyCustomOfficer::class;
                        $policy_data['model_id'] = $policy_custom_officer->id;

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

        $contract_files = [];
        $contract_custom_officer_files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file_collection) {
                if (in_array($type, [ContractCustomOfficer::FILE_DOCUMENT])) {
                    foreach ($file_collection as /* @var $file_item \Illuminate\Http\UploadedFile */ $file_item) {
                        foreach($contract_custom_officer->getFiles($type) as $old_file) {
                            $old_file->delete();
                        }

                        $contract_custom_officer_files[] = [
                            'type' => $type,
                            'original_name' => $file_item->getClientOriginalName(),
                            'path' => Storage::putFile('public/contract_custom_officer', $file_item),
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
        $contract_custom_officer->files()->createMany($contract_custom_officer_files);

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено изменение контракта');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $broker
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $broker)
    {
        $contract = $broker;

        if ($policies = $contract->policies) {
            foreach($policies as /* @var $policy Policy */ $policy) {
                $policy->delete();
            }
        }
        $contract->delete();

        return redirect()->route('contracts.index')
                         ->with('success', sprintf('Данные о контракте \'%s\' были успешно удалены', $contract->number));
    }

//    public function download($id, $info_id) {
////        @foreach($all_product->allProductInformations as $item)
////            <a target="_blank" href="{{route('broker.download', ['id' => $all_product->id, 'info_id' => $item->id])}}" class="btn btn-warning">
////                <i class="fa fa-download" aria-hidden="true"></i> Скачать {{ $item->policy_series }}
////            </a>
////        @endforeach
//        $all_product = AllProduct::find($id);
//        $product_info = AllProductInformation::find($info_id);
//        $document = new TemplateProcessor(public_path('teztools/polis.docx'));
//        Carbon::setLocale('ru');
//        $document->setValues([
//            'policy_holder_fio' => $all_product->policyHolder->FIO,
//            'policy_holder_address' => $all_product->policyHolder->address,
//            'policy_holder_phone_number' => $all_product->policyHolder->phone_number,
//            'all_product_insurance_bonus' => $all_product->insurance_bonus,
//            'policy_beneficiary_fio' => 'ФИО',
//            'policy_holder_mfo' => $all_product->policyHolder->mfo,
//            'insurance_to' => Carbon::parse($all_product->insurance_to)->translatedFormat('d F Y'),
//            'polis_payload' => $product_info->polis_payload,
//            'polis_year' => $product_info->polis_gos_num,
//            'polis_gos_num' => $product_info->state_num,
//            'num_carcase' => $product_info->num_carcase,
//            'insurance_cost' => $product_info->insurance_cost,
//            'overall_polis_sum' => $product_info->overall_polis_sum,
//        ]);
//        $document->saveAs('polis.docx');
//
//        try {
//            $API = new Convertio(config('app.convertioKey'));
//            $API->start('polis.docx', 'pdf')->wait()->download('polis.pdf')->delete();
//
//            header("Content-type:application/pdf");
//            header("Content-Disposition: inline;filename=polis.pdf");
//            readfile("polis.pdf");
//        } catch (\Exception $e) {
//            return redirect('/polis.docx');
//        }
//    }
}
