<?php

namespace App\Http\Controllers\Product;

use App\Helpers\Convertio\Convertio;
use App\Http\Requests\Neshchastka24TimeRequest;
use App\Model\Beneficiary;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractAccident;
use App\Model\Employee;
use App\Model\Policy;
use App\Model\PolicyAccident;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Product\Neshchastka24Time;
use App\Models\Product\Neshchastka24timeInformation;
use App\Models\Product\Neshchastka24TimeStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\TemplateProcessor;

class Neshchastka24TimeController extends Controller
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

        $specification = Specification::where('key', '=', 'S_CAI24HAD')->get()->first();

        $contract = new Contract();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_INDIVIDUAL;
        }
        if (isset($old_data['policies'])) {
            foreach ($old_data['policies'] as $item) {
                $policy = new Policy();
                $policy->policy_model = new PolicyAccident();

                $contract->policies[] = $policy;
            }
        }

        return view('products.neshchastka.24time.form', [
            'beneficiary' => new Beneficiary(),
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_accident' => new ContractAccident(),
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
            ContractAccident::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.insurance_sum' => 'required',
                'policies.*.franchise' => 'required',

                'policies.*.policy_accident.fio' => 'required',
                'policies.*.policy_accident.birthdate' => 'required',
                'policies.*.policy_accident.beneficiary' => 'required',
                'policies.*.policy_accident.passport_series' => 'required',
                'policies.*.policy_accident.passport_number' => 'required',
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
        $contract_accident = ContractAccident::create($request['contract_accident']);

        $contract_data = $request['contract'];
        $contract_data['beneficiary_id'] = $beneficiary->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';
        $contract_data['model_type'] = ContractAccident::class;
        $contract_data['model_id'] = $contract_accident->id;

        $contract = Contract::create($contract_data);

        foreach($policies_data as $policy_data) {
            $policy = Policy::where('name', '=', $policy_data['name'])
                            ->where('series', '=', $policy_data['series'])
                            ->get()
                            ->first();

            if ($policy) {
                $policy_accident_data = $policy_data['policy_accident'];
                $policy_accident_data['is_chronic_disease'] = isset($policy_accident_data['is_chronic_disease']) ? 1 : 0;

                $policy_accident = PolicyAccident::create($policy_accident_data);

                unset($policy_data['policy_accident']);

                $policy_data['contract_id'] = $contract->id;
                $policy_data['model_type'] = PolicyAccident::class;
                $policy_data['model_id'] = $policy_accident->id;

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
     * @param  \App\Model\Contract $neshchastka_time
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $neshchastka_time)
    {
        $contract = $neshchastka_time;

        return view('products.neshchastka.24time.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_accident' => $contract->contract_model,
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $neshchastka_time
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $neshchastka_time)
    {
        $contract = $neshchastka_time;

        return view('products.neshchastka.24time.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'contract_accident' => $contract->contract_model,
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $neshchastka_time
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $neshchastka_time)
    {
        $request->validate(array_merge(
            Beneficiary::$validate,
            Client::$validate,
            Contract::$validate,
            ContractAccident::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.insurance_sum' => 'required',
                'policies.*.franchise' => 'required',

                'policies.*.policy_accident.fio' => 'required',
                'policies.*.policy_accident.birthdate' => 'required',
                'policies.*.policy_accident.beneficiary' => 'required',
                'policies.*.policy_accident.passport_series' => 'required',
                'policies.*.policy_accident.passport_number' => 'required',
            ]
        ));

        $contract = $neshchastka_time;

        $beneficiary = $contract->beneficiary;
        $beneficiary->fill($request['beneficiary']);
        $beneficiary->save();

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract_accident = $contract->contract_model;
        $contract_accident->fill($request['contract_accident']);
        $contract_accident->save();

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
                    $policy_accident_data = $policy_data['policy_accident'];
                    $policy_accident_data['is_chronic_disease'] = isset($policy_accident_data['is_chronic_disease']) ? 1 : 0;

                    $policy_accident = $policy->policy_model;
                    $policy_accident->fill($policy_accident_data);
                    $policy_accident->save();

                    unset($policy_data['policy_accident']);

                    $policy->fill($policy_data);
                    $policy->save();
                } else {
                    $policy = Policy::where('name', '=', $policy_data['name'])
                                    ->where('series', '=', $policy_data['series'])
                                    ->get()
                                    ->first();

                    if ($policy) {
                        $policy_accident_data = $policy_data['policy_accident'];
                        $policy_accident_data['is_chronic_disease'] = isset($policy_accident_data['is_chronic_disease']) ? 1 : 0;

                        $policy_accident = PolicyAccident::create($policy_accident_data);

                        unset($policy_data['policy_accident']);

                        $policy_data['contract_id'] = $contract->id;
                        $policy_data['model_type'] = PolicyAccident::class;
                        $policy_data['model_id'] = $policy_accident->id;

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
     * @param  \App\Model\Contract $neshchastka_time
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $neshchastka_time)
    {
        $contract = $neshchastka_time;

        if ($policies = $contract->policies) {
            foreach($policies as /* @var $policy Policy */ $policy) {
                $policy->delete();
            }
        }
        $contract->delete();

        return redirect()->route('contracts.index')
                         ->with('success', sprintf('Данные о контракте \'%s\' были успешно удалены', $contract->number));
    }

/*
    public function print()
    {
        if (isset($_GET['download']) && $_GET['download'] == 'dogovor'){
            $document = new TemplateProcessor(public_path('time/dogovor.docx'));

            $document->setValues([
                'fio_agent' => $page->agent->getFio(),
                'fio_insurer' => $page->policyHolders->FIO,
                'address' => $page->agent->address,
                'tel'     => $page->agent->phone_numner,
                'vid_deyatelnosti' => $page->policyHolders->vid_deyatelnosti,
                'insurer_address' => $page->policyHolders->address,
                'insurer_tel'     => $page->policyHolders->phone_number,
                'insurer_schet'     => $page->policyHolders->checking_account,
                'insurer_mfo'     => $page->policyHolders->inn,
                'insurer_inn'     => $page->policyHolders->mfo,
                'insurer_okonx'     => $page->policyHolders->okonx,
            ]);
            if ($page->policyInformations->count() == 1){
                $document->setValues([
                    'one_polis_model' => $page->policyInformations->first()->polis_model,
                    'one_polis_modification' => $page->policyInformations->first()->polis_modification,
                    'one_polis_gos_num' => $page->policyInformations->first()->polis_gos_num,
                    'one_polis_num_engine' => $page->policyInformations->first()->polis_num_engine,
                    'count_lic' => $page->policyInformations->count(),
                    'one_from_to' => $page->insurance_from.' - '.$page->insurance_to,
                    'geo_zone' => $page->geo_zone,
                    'valuta' => $page->insurance_premium_currency,
                    'strah_sum' => $page->policyInformations->first()->polis_num_body,
                    'strah_prem' => $page->policyInformations->first()->polis_payload,
                    ]);
            }else{
                $document->setValues([
                    'one_polis_model' => '',
                    'one_polis_modification' => '',
                    'one_polis_gos_num' => '',
                    'one_polis_num_engine' => '',
                    'count_lic' => $page->policyInformations->count(),
                    'one_from_to' => $page->insurance_from.' - '.$page->insurance_to,
                    'geo_zone' => $page->geo_zone,
                        'valuta' => $page->insurance_premium_currency,
                    'strah_sum' => $page->policyInformations->sum('polis_num_body'),
                        'strah_prem' => $page->policyInformations->sum('polis_payload'),
                ]);
                foreach($page->policyInformations as $key => $info){
                    $document->setValues([
                        'one_polis_model_'.$key => $info->polis_model,
                        'one_polis_modification_'.$key => $info->polis_modification,
                        'one_polis_gos_num_'.$key => $info->polis_gos_num,
                        'one_polis_num_engine_'.$key => $info->polis_num_engine,
                        'one_strah_sum_'.$key => $info->polis_num_body,
                        'one_strah_prem_'.$key => $info->polis_payload,
                        'polis_agent_'.$key => $info->polis_agent,
                    ]);
                }


            }
            if ($page->policyInformations->count() < 5){
                for($i=$page->policyInformations->count();$i<=5;$i++){

                    $document->setValues([
                        'one_polis_model_'.$i => '',
                        'one_polis_modification_'.$i => '',
                        'one_polis_gos_num_'.$i => '',
                        'one_polis_num_engine_'.$i => '',
                        'one_strah_sum_'.$i => '',
                        'one_strah_prem_'.$i => '',
                        'polis_agent_'.$i => '',
                    ]);
                }
            }
            if ($page->policyInformations->count() == 1){
                $document->setValues([
                    'one_polis_model_0'=> '',
                    'one_polis_modification_0' => '',
                    'one_polis_gos_num_0' => '',
                    'one_polis_num_engine_0' => '',
                    'one_strah_sum_0'=> '',
                    'one_strah_prem_0' => '',
                    'polis_agent_0'=> '',
                ]);
            }
            $document->saveAs('dogovor.docx');
            try {
                $API = new Convertio(config('app.convertioKey'));
                $API->start('dogovor.docx', 'pdf')->wait()->download('dogovor.pdf')->delete();
                echo "<script>window.open('".config('app.url')."/dogovor.pdf', '_blank').print()</script>";
            }
            catch (\Exception $e)
            {
                return redirect('/dogovor.docx');
            }
        }
        if (isset($_GET['download']) && $_GET['download'] == 'anketa'){
            $document = new TemplateProcessor(public_path('time/anketa.docx'));

            $document->setValues([
                'fio_agent' => $page->agent->getFio(),
                'fio_insurer' => $page->policyHolders->FIO,
                'fio_vigoda'  => $page->PolicyBeneficiaries->FIO,
                'address' => $page->agent->address,
                'tel'     => $page->agent->phone_numner,
                'vid_deyatelnosti' => $page->policyHolders->vid_deyatelnosti,
                'insurer_address' => $page->policyHolders->address,
                'insurer_tel'     => $page->policyHolders->phone_number,
                'insurer_schet'     => $page->policyHolders->checking_account,
                'insurer_mfo'     => $page->policyHolders->inn,
                'insurer_inn'     => $page->policyHolders->mfo,
                'insurer_okonx'     => $page->policyHolders->okonx,
            ]);
            if ($page->policyInformations->count() == 1){
                $document->setValues([
                    'd_from' =>date('d',strtotime($page->insurance_from)),
                    'm_from' =>date('m',strtotime($page->insurance_from)),
                    'Y_from' =>date('Y',strtotime($page->insurance_from)),
                    'd_to' =>date('d',strtotime($page->insurance_to)),
                    'm_to' =>date('m',strtotime($page->insurance_to)),
                    'Y_to' =>date('Y',strtotime($page->insurance_to)),
                    'one_polis_model' => $page->policyInformations->first()->polis_model,
                    'one_polis_modification' => $page->policyInformations->first()->polis_modification,
                    'one_polis_gos_num' => $page->policyInformations->first()->polis_gos_num,
                    'one_polis_num_engine' => $page->policyInformations->first()->polis_num_engine,
                    'count_lic' => $page->policyInformations->count(),
                    'one_from_to' => $page->insurance_from.' - '.$page->insurance_to,
                    'geo_zone' => $page->geo_zone,
                    'valuta' => $page->insurance_premium_currency,
                    'strah_sum' => $page->policyInformations->first()->polis_num_body,
                    'strah_prem' => $page->policyInformations->first()->polis_payload,
                ]);
            }else{
                $document->setValues([
                    'one_polis_model' => '',
                    'one_polis_modification' => '',
                    'one_polis_gos_num' => '',
                    'one_polis_num_engine' => '',
                    'count_lic' => $page->policyInformations->count(),
                    'one_from_to' => $page->insurance_from.' - '.$page->insurance_to,
                    'geo_zone' => $page->geo_zone,
                    'valuta' => $page->insurance_premium_currency,
                    'strah_sum' => $page->policyInformations->sum('polis_num_body'),
                    'strah_prem' => $page->policyInformations->sum('polis_payload'),
                ]);
                foreach($page->policyInformations as $key => $info){
                    $document->setValues([
                        'one_polis_model_'.$key => $info->polis_model,
                        'one_polis_modification_'.$key => $info->polis_modification,
                        'one_polis_gos_num_'.$key => $info->polis_gos_num,
                        'one_polis_num_engine_'.$key => $info->polis_num_engine,
                        'one_strah_sum_'.$key => $info->polis_num_body,
                        'one_strah_prem_'.$key => $info->polis_payload,
                        'polis_agent_'.$key => $info->polis_agent,
                    ]);
                }


            }
            if ($page->policyInformations->count() < 5){
                for($i=$page->policyInformations->count();$i<=5;$i++){

                    $document->setValues([
                        'one_polis_model_'.$i => '',
                        'one_polis_modification_'.$i => '',
                        'one_polis_gos_num_'.$i => '',
                        'one_polis_num_engine_'.$i => '',
                        'one_strah_sum_'.$i => '',
                        'one_strah_prem_'.$i => '',
                        'polis_agent_'.$i => '',
                    ]);
                }
            }
            if ($page->policyInformations->count() == 1){
                $document->setValues([
                    'one_polis_model_0'=> '',
                    'one_polis_modification_0' => '',
                    'one_polis_gos_num_0' => '',
                    'one_polis_num_engine_0' => '',
                    'one_strah_sum_0'=> '',
                    'one_strah_prem_0' => '',
                    'polis_agent_0'=> '',
                ]);
            }
            $document->saveAs('anketa.docx');
            try {
                $API = new Convertio(config('app.convertioKey'));
                $API->start('anketa.docx', 'pdf')->wait()->download('anketa.pdf')->delete();
                echo "<script>window.open('".config('app.url')."/anketa.pdf', '_blank').print()</script>";
            }
            catch (\Exception $e)
            {
                return redirect('/anketa.docx');
            }
        }
        if (isset($_GET['download']) && $_GET['download'] == 'polis'){
            $document = new TemplateProcessor(public_path('time/polis.docx'));
       $inform = $page->policyInformations[$_GET['count']];
            $document->setValues([
                'fio_insurer' => $page->policyHolders->FIO,
                'vid_deyatelnosti' => $page->policyHolders->vid_deyatelnosti,
                'strah_litso'      => $inform->polis_model,
                'd_from' =>date('d',strtotime($page->insurance_from)),
                'm_from' =>date('m',strtotime($page->insurance_from)),
                'Y_from' =>date('Y',strtotime($page->insurance_from)),
                'd_to' =>date('d',strtotime($page->insurance_to)),
                'm_to' =>date('m',strtotime($page->insurance_to)),
                'Y_to' =>date('Y',strtotime($page->insurance_to)),
                'geo_zone' => $page->geo_zone,
                'strah_sum' => $page->policyInformations->sum('polis_num_body'),
                'strah_prem' => $page->policyInformations->sum('polis_payload'),
                'one_strah_sum' => $inform->polis_num_body,
                'fio_agent' => $page->agent->getFio(),
            ]);



            $document->saveAs('polis.docx');
            try {
                $API = new Convertio(config('app.convertioKey'));
                $API->start('polis.docx', 'pdf')->wait()->download('polis.pdf')->delete();
                echo "<script>window.open('".config('app.url')."/polis.pdf', '_blank').print()</script>";
            }
            catch (\Exception $e)
            {
                return redirect('/polis.docx');
            }
        }

                                <a href="{{route('neshchastka-time.edit', $contract->id)}}?download=dogovor">Скачать Договор</a>
                                <a href="{{route('neshchastka-time.edit', $contract->id)}}?download=anketa">Скачать Анкету</a>

                                @foreach($contract->policies as $policy)
                                    <a href="{{route('neshchastka-time.edit', $policy->id)}}?download=polis">Скачать Полис {{$policy->name}} {{$policy->series}}</a>
                                @endforeach
    }
*/
}
