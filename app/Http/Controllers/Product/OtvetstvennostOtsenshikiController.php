<?php

namespace App\Http\Controllers\Product;

use App\Helpers\Convertio\Convertio;
use App\Http\Controllers\Controller;
use App\Http\Requests\OtvetstvennostOtsenshikiRequest;
use App\Model\Client;
use App\Model\Contract;
use App\Model\Employee;
use App\Models\PolicyHolder;
use App\Models\Product\OtvetstvennostOtsenshiki;
use App\Models\Product\OtvetstvennostOtsenshikiInfo;
use App\Models\Product\OtvetstvennostOtsenshikiStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpOffice\PhpWord\TemplateProcessor;

class OtvetstvennostOtsenshikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $agents = Employee::where('role', Employee::ROLE_AGENT)->get();
        $client = new Client();
        $contract = new Contract();
        $policySeries = [];

        return view('products.otvetstvennost.otsenshiki.create', compact('agents', 'client', 'contract', 'policySeries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(OtvetstvennostOtsenshikiRequest $request)
    {
        $polycyHolder = PolicyHolder::createPolicyHolders($request);
        $otsenshiki = OtvetstvennostOtsenshiki::createOtsenshik($request, $polycyHolder->id);
        OtvetstvennostOtsenshikiInfo::createOtsenshikInfo($request, $otsenshiki->id);
        OtvetstvennostOtsenshikiStrahPremiya::createOtsenshikiStrahPremiya($request, $otsenshiki->id);
        return redirect(route('otvetstvennost-otsenshiki.edit', $otsenshiki->id));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $agents = Agent::getActiveAgent();
        $banks = Bank::getBanks();
        $policySeries = PolicySeries::get();
        $page = OtvetstvennostOtsenshiki::with('strahPremiya', 'policyHolders', 'infos')->find($id);

        return view('products.otvetstvennost.otsenshiki.show', compact('banks', 'agents', 'policySeries', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $agents = Agent::getActiveAgent();
        $banks = Bank::getBanks();
        $policySeries = PolicySeries::get();
        $page = OtvetstvennostOtsenshiki::with('strahPremiya','policyHolders', 'infos', 'agent')->find($id);
        if (isset($_GET['download']) && $_GET['download'] == 'dogovor'){
            $document = new TemplateProcessor(public_path('otvetstvennost_otsenshiki/dogovor.docx'));
            $document->setValues([
                'fio_insurer' => $page->policyHolders->FIO,
                'fio_agent' => $page->agent->getFio(),
                'period_strah_from' => $page->insurance_from,
                'period_strah_to' =>$page->insurance_to,
                'strah_sum' => $page->strahPremiya->sum('insurer_sum'),
                'strah_prem' => $page->strahPremiya->sum('insurer_premium'),
                'insurer_address' => $page->policyHolders->address,
                'insurer_tel'     => $page->policyHolders->phone_number,
                'insurer_schet'     => $page->policyHolders->checking_account,
                'insurer_mfo'     => $page->policyHolders->inn,
                'insurer_inn'     => $page->policyHolders->mfo,
                'agent_address'   => $page->agent->address,
                'agent_tel'       => $page->agent->phone_number,

            ]);

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
            $document = new TemplateProcessor(public_path('otvetstvennost_otsenshiki/anketa.docx'));
            $document->setValues([
                'fio_insurer' => $page->policyHolders->FIO,
                'fio_agent' => $page->agent->getFio(),
                'insurer_address' => $page->policyHolders->address,
                'insurer_tel'     => $page->policyHolders->phone_number,
                'insurer_schet'     => $page->policyHolders->checking_account,
                'insurer_mfo'     => $page->policyHolders->inn,
                'insurer_inn'     => $page->policyHolders->mfo,
                'first_year' => $page->first_year ?? '',
                'second_year' => $page->second_year ?? '',
                'first_turnover' => $page->first_turnover ?? '',
                'second_turnover' => $page->second_turnover ?? '',
                'first_profit' => $page->first_profit ?? '',
                'second_profit' => $page->second_profit ?? '',
                'public_sector_comment' => $page->public_sector_comment ?? '',
                'info_personal' => $page->info_personal,
                'prof_riski' => $page->prof_riski ?? '',
                'reason_case' => $page->reason_case ?? '',
                'reason_administrative_case' => $page->reason_administrative_case ?? '',
                'sfera_deyatelnosti' => $page->sfera_deyatelnosti ?? '',
                'period_strah_from' => $page->insurance_from,
                'period_strah_to' =>$page->insurance_to,
                'limit_otvetstvennosti' => $page->limit_otvetstvennosti,

            ]);

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
            $document = new TemplateProcessor(public_path('otvetstvennost_otsenshiki/polis.docx'));
            $inform = $page->infos[$_GET['count']];
            $document->setValues([
                'fio_insurer' => $inform->insurer_fio,
                'strah_sum' => $inform->insurer_sum,
                'strah_prem' => $page->infos->sum('insurer_premium'),
                'd_from' =>date('d',strtotime($page->insurance_from)),
                'm_from' =>date('m',strtotime($page->insurance_from)),
                'Y_from' =>date('Y',strtotime($page->insurance_from)),
                'd_to' =>date('d',strtotime($page->insurance_to)),
                'm_to' =>date('m',strtotime($page->insurance_to)),
                'Y_to' =>date('Y',strtotime($page->insurance_to)),
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
        return view('products.otvetstvennost.otsenshiki.edit', compact('banks', 'agents', 'policySeries', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(OtvetstvennostOtsenshikiRequest $request, $id)
    {
        $polycyHolder = PolicyHolder::updatePolicyHolders($id, $request);
        $otsenshiki = OtvetstvennostOtsenshiki::updateOtsenshik($request, $polycyHolder->id, $id);
        OtvetstvennostOtsenshikiInfo::updateOtsenshikInfo($request, $otsenshiki);
        OtvetstvennostOtsenshikiStrahPremiya::updateOtsenshikiStrahPremiya($request, $otsenshiki);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
