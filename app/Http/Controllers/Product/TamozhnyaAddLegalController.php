<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\TamozhnyaAddLegalRequest;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractCustomPayment;
use App\Model\Employee;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\Dogovor;
use App\Models\Policy;
use App\Models\PolicyHolder;
use App\Models\Product;
use App\Models\Product\TamozhnyaAddLegal;
use App\Models\Product\TamozhnyaAddLegalStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Settings;
use Dompdf\Dompdf;
use App\Helpers\Convertio\Convertio;

class TamozhnyaAddLegalController extends Controller
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

        $specification = Specification::where('key', '=', 'S_CLIFCP')->get()->first();

        $contract = new Contract();
        $contract_custom_payment = new ContractCustomPayment();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_INDIVIDUAL;
        }

        return view('products.tamozhnya.add-legal.form', [
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_custom_payment' => $contract_custom_payment,
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
            ContractCustomPayment::$validate,
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

        $client = Client::create($request['client']);
        $contract_custom_payment = ContractCustomPayment::create($request['contract_custom_payment']);

        $contract_data = $request['contract'];
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractCustomPayment::class;
        $contract_data['model_id'] = $contract_custom_payment->id;

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
     * @param  \App\Model\Contract $tamozhnya_add_legal
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $tamozhnya_add_legal)
    {
        $contract = $tamozhnya_add_legal;

        return view('products.tamozhnya.add-legal.form', [
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_custom_payment' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $tamozhnya_add_legal
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $tamozhnya_add_legal)
    {
        $contract = $tamozhnya_add_legal;

        return view('products.tamozhnya.add-legal.form', [
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_custom_payment' => $contract->contract_model,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $tamozhnya_add_legal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $tamozhnya_add_legal)
    {
        $request->validate(array_merge(
            Client::$validate,
            Contract::$validate,
            ContractCustomPayment::$validate,
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

        $contract = $tamozhnya_add_legal;

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_custom_payment = $contract->contract_model;
        $contract_custom_payment->fill($request['contract_custom_payment']);
        $contract_custom_payment->save();

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
     * @param  \App\Model\Contract $tamozhnya_add_legal
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $tamozhnya_add_legal)
    {
        $contract = $tamozhnya_add_legal;

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
//                                <div class="col-sm-6">
//                                    <a href="{{route('tamozhnya-add-legal.edit', $tamozhnya->id)}}?download=dogovor" class="btn btn-warning">
//                                        <i class="fa fa-download" aria-hidden="true"></i> Скачать Договор
//                                    </a>
//                                    <a href="{{route('tamozhnya-add-legal.edit', $tamozhnya->id)}}?download=za" class="btn btn-warning">
//                                        <i class="fa fa-download" aria-hidden="true"></i> Скачать Заявление
//                                    </a>
//                                    <a href="{{route('tamozhnya-add-legal.edit', $tamozhnya->id)}}?download=polis" class="btn btn-warning">
//                                        <i class="fa fa-download" aria-hidden="true"></i> Скачать Полис
//                                    </a>
//                                </div>
//        if (isset($_GET['download']) && $_GET['download'] == 'dogovor') {
//            $document = new TemplateProcessor(public_path('tamozhnya_add_legal/dogovor.docx'));
//            $document->setValues([
//                'y' => $tamozhnya->created_at->year,
//                'month' => $tamozhnya->created_at->month,
//                'day' => $tamozhnya->created_at->day,
//                'unique_number' => $tamozhnya->unique_number,
//                'litso' => $tamozhnya->agent->getFio(),
//                'fio_insurer' => $tamozhnya->policyHolders->FIO,
//                'strahovaya_sum' => $tamozhnya->strahovaya_sum,
//                'strahovaya_purpose' => $tamozhnya->strahovaya_purpose,
//                'address' => $tamozhnya->agent->user->brnach->address,
//                'tel' => $tamozhnya->agent->user->brnach->phone_numner,
//                'insurer_address' => $tamozhnya->policyHolders->address,
//                'insurer_tel' => $tamozhnya->policyHolders->phone_number,
//                'insurer_schet' => $tamozhnya->policyHolders->checking_account,
//                'insurer_mfo' => $tamozhnya->policyHolders->inn,
//                'insurer_inn' => $tamozhnya->policyHolders->mfo,
//                'insurer_oked' => $tamozhnya->policyHolders->oked,
//            ]);
//            $document->saveAs('dogovor.docx');
//
//            try {
//                $API = new Convertio(config('app.convertioKey'));
//                $API->start('dogovor.docx', 'pdf')->wait()->download('dogovor.pdf')->delete();
//
//                echo "<script>window.open('" . config('app.url') . "/dogovor.pdf', '_blank').print();</script>";
//            } catch (\Exception $e) {
//                return redirect('/dogovor.docx');
//            }
//        }
//        if (isset($_GET['download']) && $_GET['download'] == 'za') {
//            $document = new TemplateProcessor(public_path('tamozhnya_add_legal/za.docx'));
//            $document->setValues([
//                'description' => $tamozhnya->description,
//                'prichina_pretenzii' => $tamozhnya->prichina_pretenzii,
//                'insurer_tel' => $tamozhnya->policyHolders->phone_number,
//                'insurer_schet' => $tamozhnya->policyHolders->checking_account,
//                'insurer_mfo' => $tamozhnya->policyHolders->inn,
//                'insurer_inn' => $tamozhnya->policyHolders->mfo,
//                'litso' => $tamozhnya->agent->getFio(),
//                'fio_insurer' => $tamozhnya->policyHolders->FIO,
//            ]);
//            $document->saveAs('za.docx');
//
//            try {
//                $API = new Convertio(config('app.convertioKey'));
//                $API->start('za.docx', 'pdf')->wait()->download('za.pdf')->delete();
//
//                echo "<script>window.open('" . config('app.url') . "/za.pdf', '_blank').print();</script>";
//            } catch (\Exception $e) {
//                return redirect('/za.docx');
//            }
//        }
//        if (isset($_GET['download']) && $_GET['download'] == 'polis') {
//            $document = new TemplateProcessor(public_path('tamozhnya_add_legal/polis.docx'));
//            $document->setValues([
//                'date_issue_policy' => $tamozhnya->date_issue_policy,
//                'fio_insurer' => $tamozhnya->policyHolders->FIO,
//                'from_date' => $tamozhnya->from_date,
//                'to_date' => $tamozhnya->to_date,
//                'strahovaya_sum' => $tamozhnya->strahovaya_sum,
//                'strahovaya_purpose' => $tamozhnya->strahovaya_purpose,
//                'director' => $tamozhnya->agent->user->branch->director->getFIO(),
//            ]);
//            $document->saveAs('polis.docx');
//
//            try {
//                $API = new Convertio(config('app.convertioKey'));
//                $API->start('polis.docx', 'pdf')->wait()->download('polis.pdf')->delete();
//
//                echo "<script>window.open('" . config('app.url') . "/polis.pdf', '_blank').print();</script>";
//            } catch (\Exception $e) {
//                return redirect('/polis.docx');
//            }
//        }
//    }
}
