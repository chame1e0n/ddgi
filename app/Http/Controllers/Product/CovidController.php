<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\CovidRequest;
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
        $policySeries = PolicySeries::all();
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.covid.fiz-litso.create', compact('banks', 'agents', 'policySeries'));
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
