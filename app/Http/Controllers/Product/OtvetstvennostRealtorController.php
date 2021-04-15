<?php

namespace App\Http\Controllers\Product;

use App\Helpers\Convertio\Convertio;
use App\Http\Requests\OtvetstvennostRealtorRequest;
use App\Models\PolicyHolder;
use App\Models\Product\OtvetstvennostRealtorInfo;
use App\Models\Product\OtvetstvennostRealtorStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use \App\Models\Product\OtvetstvennostRealtor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\TemplateProcessor;

class OtvetstvennostRealtorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $policySeries = PolicySeries::all();
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.otvetstvennost.realtor.create', compact('banks', 'agents', 'policySeries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OtvetstvennostRealtorRequest $request)
    {
        $newPolicyHolders           = PolicyHolder::createPolicyHolders($request);
        if(!$newPolicyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
        $realtor = OtvetstvennostRealtor::createRealtor($request, $newPolicyHolders->id);
        OtvetstvennostRealtorInfo::createRealtorInfo($request, $realtor->id);
        OtvetstvennostRealtorStrahPremiya::createRealtorStrahPremiya($request, $realtor->id);
        return redirect(route('otvetstvennost-realtor.edit', $realtor->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agents = Agent::getActiveAgent();
        $banks = Bank::getBanks();
        $policySeries =  PolicySeries::get();
        $page = OtvetstvennostRealtor::with('strahPremiya','policyHolders','infos')->find($id);
//        dd($page);
        return view('products.otvetstvennost.realtor.show', compact('banks', 'agents', 'policySeries', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agents = Agent::getActiveAgent();
        $banks = Bank::getBanks();
        $policySeries =  PolicySeries::get();
        $page = OtvetstvennostRealtor::with('strahPremiya','policyHolders','infos')->find($id);

        if (isset($_GET['download']) && $_GET['download'] == 'polis'){
            $document = new TemplateProcessor(public_path('otvetstvennost_realtor/polis.docx'));
            $document->setValues([
                'fio_insurer' => $page->policyHolders->FIO,
                'insurance_from' =>  date('d-m-Y', strtotime($page->insurance_from)),
                'insurance_to' => date('d-m-Y', strtotime($page->insurance_to)),
                'insurer_sum' => $page->infos->sum('insurer_sum'),
                'insurer_premium' => $page->infos->sum('insurer_premium'),
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
        if (isset($_GET['download']) && $_GET['download'] == 'dogovor'){
            $document = new TemplateProcessor(public_path('otvetstvennost_realtor/dogovor.docx'));
            $document->setValues([
                'litso' => $page->agent->getFio(),
                'fio_insurer' => $page->policyHolders->FIO,
                'insurance_from' =>  date('d-m-Y', strtotime($page->insurance_from)),
                'insurance_to' => date('d-m-Y', strtotime($page->insurance_to)),
                'insurer_sum' => $page->infos->sum('insurer_sum'),
                'insurer_premium' => $page->infos->sum('insurer_premium'),
                'franshiza' => $page->franshiza,
                'address' => $page->agent->user->brnach->address,
                'tel'     => $page->agent->user->brnach->phone_numner,
                'insurer_address' => $page->policyHolders->address,
                'insurer_tel'     => $page->policyHolders->phone_number,

                'insurer_schet'     => $page->policyHolders->checking_account,
                'insurer_mfo'     => $page->policyHolders->inn,
                'insurer_inn'     => $page->policyHolders->mfo,
                'insurer_oked'     => $page->policyHolders->oked,


                'activity_period'     => $page->activity_period_all,
                'private_sector'     => $page->private_sector_comment,
                'public_sector'     => $page->public_sector_comment,
                'prof_riski'     => $page->prof_riski,
                'reason_case'     => $page->reason_case,
                'reason_administrative_case'     => $page->reason_administrative_case,
                'sfera'     => config('app.sfera_deyatelnosti')[$page->sfera_deyatelnosti],
                'limit'     => config('app.limit_otvetstvennosti')[$page->limit_otvetstvennosti],

            ]);
            $document->saveAs('dogovor.docx');
//            try {
//                $API = new Convertio(config('app.convertioKey'));
//                $API->start('dogovor.docx', 'pdf')->wait()->download('dogovor.pdf')->delete();
//                echo "<script>window.open('".config('app.url')."/dogovor.pdf', '_blank').print()</script>";
//            }
//            catch (\Exception $e)
//            {
                echo "<script>window.open('".config('app.url')."/dogovor.docx', '_blank').print()</script>";
//            }
        }
//        dd($page);
        return view('products.otvetstvennost.realtor.edit', compact('banks', 'agents', 'policySeries', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OtvetstvennostRealtorRequest $request, $id)
    {
        $realtor   = OtvetstvennostRealtor::updateRealtor($request,$id);
        $polycyHolder = PolicyHolder::updatePolicyHolders($realtor->policy_holder_id, $request);
        OtvetstvennostRealtorInfo::updateRealtorInfo($request, $realtor);
        OtvetstvennostRealtorStrahPremiya::updateRealtorStrahPremiya($request, $realtor);

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
