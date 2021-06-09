<?php

namespace App\Http\Controllers\Product;

use App\Helpers\Convertio\Convertio;
use App\Http\Requests\Neshchastka24TimeRequest;
use App\Model\Beneficiary;
use App\Model\Client;
use App\Model\Contract;
use App\Model\Employee;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Product\Neshchastka24Time;
use App\Models\Product\Neshchastka24timeInformation;
use App\Models\Product\Neshchastka24TimeStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\TemplateProcessor;

class Neshchastka24TimeController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Employee::where('role', Employee::ROLE_AGENT)->get();
        $beneficiary = new Beneficiary();
        $client = new Client();
        $contract = new Contract();
        $polis_series = [];

        return view('products.neshchastka.24time.create', compact('agents', 'beneficiary', 'client', 'contract', 'polis_series'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Neshchastka24TimeRequest $request)
    {
//        dd($request->all());
        $p = PolicyHolder::createPolicyHolders($request);
        $b = PolicyBeneficiaries::createPolicyBeneficiaries($request);

        $time = Neshchastka24Time::createTime($p,$b,$request);
        Neshchastka24TimeStrahPremiya::createStrah($time,$request);
        Neshchastka24timeInformation::createInfo($time,$request);

        return redirect(route('neshchastka-time.edit', $time->id));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Neshchastka24Time::with('StrahPremiya', 'policyHolders', 'PolicyBeneficiaries', 'policyInformations')->find($id);
        $banks = Bank::getBanks();
        $agents = Agent::getActiveAgent();
        $polis_series = PolicySeries::get();
        return view('products.neshchastka.24time.show', compact('page', 'banks', 'agents', 'polis_series'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Neshchastka24Time::with('StrahPremiya', 'policyHolders', 'PolicyBeneficiaries', 'policyInformations')->find($id);
        $banks = Bank::getBanks();
        $agents = Agent::getActiveAgent();
        $polis_series = PolicySeries::get();
//        dd($page->policyInformations->sum('polis_num_body')
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

        return view('products.neshchastka.24time.edit', compact('banks', 'agents', 'page', 'polis_series'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Neshchastka24TimeRequest $request, $id)
    {
        $time = Neshchastka24Time::updateTime($request, $id);

        $p = PolicyHolder::updatePolicyHolders($time->policy_holder_id,$request);
        $b = PolicyBeneficiaries::updatePolicyBeneficiaries($time->policy_beneficiary_id,$request);


        Neshchastka24TimeStrahPremiya::updateStrah($time,$request);
        Neshchastka24timeInformation::updateInfo($time,$request);

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
