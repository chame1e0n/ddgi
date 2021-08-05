<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\TamozhnyaAddRequest;
use App\Model\Beneficiary;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractCustomWarehouse;
use App\Model\Employee;
use App\Model\Policy;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Product\TamozhnyaAdd;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\TamozhnyaAddStrahPremiya;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\TemplateProcessor;

class TamozhnyaAddController extends Controller
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

        $specification = Specification::where('key', '=', 'S_CLI')->get()->first();

        $contract = new Contract();
        $contract_custom_warehouse = new ContractCustomWarehouse();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_INDIVIDUAL;
        }

        return view('products.tamozhnya.add.form', [
            'beneficiary' => new Beneficiary(),
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_custom_warehouse' => $contract_custom_warehouse,
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
            ContractCustomWarehouse::$validate,
            [
                'policy.name' => 'required',
                'policy.series' => 'required',
                'policy.date_of_issue' => 'required',
                'policy.polis_from_date' => 'required',
                'policy.polis_to_date' => 'required',
                'policy.insurance_sum' => 'required',
                'policy.franchise' => 'required',

                'tranches.*.sum' => 'required',
                'tranches.*.from' => 'required',
            ],
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
        $contract_custom_warehouse = ContractCustomWarehouse::create($request['contract_custom_warehouse']);

        $contract_data = $request['contract'];
        $contract_data['beneficiary_id'] = $beneficiary->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractCustomWarehouse::class;
        $contract_data['model_id'] = $contract_custom_warehouse->id;

        $contract = Contract::create($contract_data);

        $policy_data['contract_id'] = $contract->id;

        $policy->fill($policy_data);
        $policy->save();

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
     * @param  \App\Model\Contract $tamozhnya_add
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $tamozhnya_add)
    {
        $contract = $tamozhnya_add;

        return view('products.tamozhnya.add.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_custom_warehouse' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $tamozhnya_add
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $tamozhnya_add)
    {
        $contract = $tamozhnya_add;

        return view('products.tamozhnya.add.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_custom_warehouse' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $tamozhnya_add
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $tamozhnya_add)
    {
        $request->validate(array_merge(
            Beneficiary::$validate,
            Client::$validate,
            Contract::$validate,
            ContractCustomWarehouse::$validate,
            [
                'policy.name' => 'required',
                'policy.series' => 'required',
                'policy.date_of_issue' => 'required',
                'policy.polis_from_date' => 'required',
                'policy.polis_to_date' => 'required',
                'policy.insurance_sum' => 'required',
                'policy.franchise' => 'required',

                'tranches.*.sum' => 'required',
                'tranches.*.from' => 'required',
            ],
        ));

        $contract = $tamozhnya_add;

        $beneficiary = $contract->beneficiary;
        $beneficiary->fill($request['beneficiary']);
        $beneficiary->save();

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_custom_warehouse = $contract->contract_model;
        $contract_custom_warehouse->fill($request['contract_custom_warehouse']);
        $contract_custom_warehouse->save();

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
     * @param  \App\Model\Contract $tamozhnya_add
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $tamozhnya_add)
    {
        $contract = $tamozhnya_add;

        if ($policies = $contract->policies) {
            foreach($policies as /* @var $policy Policy */ $policy) {
                $policy->delete();
            }
        }
        $contract->delete();

        return redirect()->route('contracts.index')
                         ->with('success', sprintf('Данные о контракте \'%s\' были успешно удалены', $contract->number));
    }

//    public function print()
//    {
//                        <a href="{{route('tamozhnya-add.edit', $tamozhnya->id)}}?download=dogovor">Скачать Договор</a>
//                        <a href="{{route('tamozhnya-add.edit', $tamozhnya->id)}}?download=za">Скачать Заявление</a>
//                        <a href="{{route('tamozhnya-add.edit', $tamozhnya->id)}}?download=polis">Скачать Полис</a>
//        if (isset($_GET['download']) && $_GET['download'] == 'dogovor') {
//            $document = new TemplateProcessor(public_path('tamozhnya_documents/dogovor.docx'));
//            $document->setValues([
//                'litso' => $tamozhnya->agent->getFIO(),
//                'fio_insurer' => $tamozhnya->policyHolders->FIO,
//                'strahovaya_sum' => $tamozhnya->strahovaya_sum,
//                'strahovaya_purpose' => $tamozhnya->strahovaya_purpose,
//                'address' => $tamozhnya->agent->user->brnach->address,
//                'tel' => $tamozhnya->agent->user->brnach->phone_numner,
//                'insurer_address' => $tamozhnya->policyHolders->address,
//                'insurer_tel' => $tamozhnya->policyHolders->phone_number,
//                'director' => /*$tamozhnya->agent->user->director->getFIO()*/ 'test',
//                'insurer_schet' => $tamozhnya->policyHolders->checking_account,
//                'insurer_mfo' => $tamozhnya->policyHolders->inn,
//                'insurer_inn' => $tamozhnya->policyHolders->mfo,
//                'insurer_oked' => $tamozhnya->policyHolders->oked,
//                'filial' => $tamozhnya->agent->user->brnach->name,
//            ]);
//            $document->saveAs('dogovor.docx');
//            Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
//            Settings::setPdfRendererPath('.');
//            $phpWord = IOFactory::load('dogovor.docx');
//            $phpWord->setDefaultFontName('dejavu sans');
//
//            $xmlWriter = IOFactory::createWriter($phpWord, 'PDF');
//            $xmlWriter->save('result.pdf');
////            return response()->download('dogovor.docx');
//        }
//        if (isset($_GET['download']) && $_GET['download'] == 'za') {
//            $document = new TemplateProcessor(public_path('tamozhnya_documents/anketa.docx'));
//            $document->setValues([
//                'description' => $tamozhnya->description,
//                'prichina_pretenzii' => $tamozhnya->prichina_pretenzii,
//                'warehouse_volume' => $tamozhnya->warehouse_volume,
//                'product_volume' => $tamozhnya->product_volume,
//                'insurer_tel' => $tamozhnya->policyHolders->phone_number,
//                'insurer_schet' => $tamozhnya->policyHolders->checking_account,
//                'insurer_mfo' => $tamozhnya->policyHolders->inn,
//                'insurer_inn' => $tamozhnya->policyHolders->mfo,
//                'litso' => $tamozhnya->agent->getFio(),
//                'fio_insurer' => $tamozhnya->policyHolders->FIO,
//            ]);
//            $document->saveAs('za.docx');
//            return response()->url('za.docx');
//        }
//        if (isset($_GET['download']) && $_GET['download'] == 'polis') {
//            $document = new TemplateProcessor(public_path('tamozhnya_documents/polis.docx'));
//            $document->setValues([
//                'date_issue_policy' => $tamozhnya->date_issue_policy,
//                'fio_insurer' => $tamozhnya->policyHolders->FIO,
//                'from_date' => $tamozhnya->from_date,
//                'to_date' => $tamozhnya->to_date,
//                'strahovaya_sum' => $tamozhnya->strahovaya_sum,
//                'strahovaya_purpose' => $tamozhnya->strahovaya_purpose,
//                'director' => $tamozhnya->agent->user->branch->director->getFIO(),
//                'filial' => $tamozhnya->agent->user->brnach->name,
//            ]);
//            $document->saveAs('polis.docx');
//            return response()->download('polis.docx');
//        }
//    }
}
