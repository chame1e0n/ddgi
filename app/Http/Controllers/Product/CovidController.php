<?php

namespace App\Http\Controllers\Product;

use App\Helpers\Convertio\Convertio;
use App\Http\Requests\CovidRequest;
use App\Model\Beneficiary;
use App\Model\Client;
use App\Model\Contract;
use App\Model\Employee;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Product\Covid;
use App\Models\Product\CovidPolicyInformation;
use App\Models\Product\CovidStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\TemplateProcessor;

class CovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $policySeries = [];        

        return view('products.covid.fiz-litso.create', compact('agents', 'beneficiary', 'client', 'contract', 'policySeries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CovidRequest $request)
    {
        $newPolicyHolders           = PolicyHolder::createPolicyHolders($request);
        if(!$newPolicyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
        $newPolicyBeneficiaries     = PolicyBeneficiaries::createPolicyBeneficiaries($request);
        if(!$newPolicyBeneficiaries)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newPolicyBeneficiaries')]);
        $request->policy_holder_id = $newPolicyHolders->id;
        $request->policy_beneficiary_id = $newPolicyBeneficiaries->id;
        if ($request->hasFile('anketa_img')) {
            $image          = $request->file('anketa_img')->store('/img/PolicyHolder', 'public');
            $request->anketa_img   = $image;
        }
        if ($request->hasFile('dogovor_img')) {
            $image          = $request->file('dogovor_img')->store('/img/PolicyHolder', 'public');
            $request->dogovor_img   = $image;
        }
        if ($request->hasFile('polis_img')) {
            $image          = $request->file('polis_img')->store('/img/PolicyHolder', 'public');
            $request->polis_img   = $image;
        }
        $newCovid = Covid::createCovid($request);
        $covidInfo = CovidPolicyInformation::createCovidInfo($request, $newCovid);
        CovidStrahPremiya::createCovidStrahPremiya($request, $newCovid->id);
        if(!$newCovid)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newCovid')]);

        return redirect()->route('covid-fiz.edit', $newCovid->id)->withInput()->with([sprintf('Данные успешно добавлены')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Covid::getInfoCovid($id);
        $banks = Bank::all();
        $agents = Agent::all();
        $policySeries = PolicySeries::all();
        return view('products.covid.fiz-litso.show', compact('banks', 'agents', 'page', 'policySeries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Covid::getInfoCovid($id);
        $banks = Bank::all();
        $agents = Agent::all();
        $policySeries = PolicySeries::all();
        if (isset($_GET['download']) && $_GET['download'] == 'polis'){
            $document = new TemplateProcessor(public_path('covid/polis.docx'));
            $document->setValues([
                'fio_insurer' => $page->policyHolders->FIO,
                'ins_passport' => $page->policyHolders->passport_series.' '.$page->policyHolders->passport_number,
                'ben_passport' => $page->policyBeneficiaries->seria_passport.' '.$page->policyBeneficiaries->nomer_passport,
                'ins_phone'    => $page->policyHolders->phone_number,
                'ben_phone'    => $page->policyBeneficiaries->phone_number,
                'from_dd' =>  date('d', strtotime($page->insurance_from)),
                'from_mm' =>  date('m', strtotime($page->insurance_from)),
                'from_year' =>  date('Y', strtotime($page->insurance_from)),
                'insurance_to' => date('d-m-Y', strtotime($page->insurance_to)),
                'insurance_sum' => $page->infos->sum('insurance_sum'),
                'insurance_premium' => $page->strahPremiya->sum('prem_sum'),
                'litso' => $page->agent->getFio(),
                'branch' => $page->agent->user->brnach->address,
            ]);
            $last = 0;
            foreach ($page->infos as $key => $info)
            {
                $document->setValues([
                    'person_fio'.$key => $info->person_name.' '.$info->person_surname.' '.$info->person_lastname,
                    'person_passport'.$key   => $info->series_and_number_passport,
                    'person_sum'.$key => $info->insurance_sum,
                ]);
                $last = $key;
            }
            for($i = $last; $i<5; $i++)
            {
                $document->setValues([
                    'person_fio'.$i => null,
                    'person_passport'.$i   => null,
                    'person_sum'.$i => null,
                ]);
            }
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
        return view('products.covid.fiz-litso.edit', compact('banks', 'agents', 'page', 'policySeries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CovidRequest $request, $id)
    {
        $covid = Covid::findOrFail($id);
        $policyHolders = PolicyHolder::updatePolicyHolders($covid->policy_holder_id, $request);
        if (!$policyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при обновлении PolicyHolders')]);
        $policyBeneficiaries = PolicyBeneficiaries::updatePolicyBeneficiaries($covid->policy_beneficiary_id, $request);
        if (!$policyBeneficiaries)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newPolicyBeneficiaries')]);

        $request->policy_holder_id = $policyHolders->id;
        $request->policy_beneficiary_id = $policyBeneficiaries->id;
        if ($request->hasFile('anketa_img')) {
            $image = $request->file('anketa_img')->store('/img/PolicyHolder', 'public');
            $request->anketa_img = $image;
        } else
            $request->anketa_img = $covid->anketa_img;

        if ($request->hasFile('dogovor_img')) {
            $image = $request->file('dogovor_img')->store('/img/PolicyHolder', 'public');
            $request->dogovor_img = $image;
        } else
            $request->dogovor_img = $covid->dogovor_img;

        if ($request->hasFile('polis_img')) {
            $image = $request->file('polis_img')->store('/img/PolicyHolder', 'public');
            $request->polis_img = $image;
        } else
            $request->polis_img = $covid->polis_img;

        $covid = Covid::updateCovid($id, $request);
        if (!$covid)
            return back()->withInput()->withErrors([sprintf('Ошибка при обновлении $covid')]);
        $covidInfo = CovidPolicyInformation::updateCovidInfo($request, $covid);
        CovidStrahPremiya::updateCovidStrahPremiya($request, $covid);
        return back()->withInput()->with([sprintf('Данные успешно обновлены')]);
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
