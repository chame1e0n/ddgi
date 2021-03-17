<?php

namespace App\Http\Controllers\Product;

use App\Models\PolicyHolder;
use App\Models\Product\CrediFinRiskNepogashenAvtocredit;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Zaemshik;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrediFinRiskNepogashenAvtocreditController extends Controller
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
        $banks = Bank::getBanks();
        $agents = Agent::getActiveAgent();
        return view('products.credit-fin-risk.nepogashen-avtocredit.create', compact('banks', 'agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $policyHolder = PolicyHolder::createPolicyHolders($request);
        $zaemshik = Zaemshik::createZaemshik($request);
        $data['zaemshik_id'] = $zaemshik->id;
        $data['policy_holder_id'] = $policyHolder->id;
        CrediFinRiskNepogashenAvtocredit::UpdateOrCreateCreditFinRiskNepogashenAvtocredits($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = CrediFinRiskNepogashenAvtocredit::with('policyHolders','zaemshik')->findOrFail($id);
        $banks = Bank::getBanks();
        $agents = Agent::getActiveAgent();
        return view('products.credit-fin-risk.nepogashen-avtocredit.show', compact('banks', 'agents', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = CrediFinRiskNepogashenAvtocredit::with('policyHolders','zaemshik')->findOrFail($id);
        $banks = Bank::getBanks();
        $agents = Agent::getActiveAgent();
        return view('products.credit-fin-risk.nepogashen-avtocredit.edit', compact('banks', 'agents', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $page = CrediFinRiskNepogashenAvtocredit::UpdateOrCreateCreditFinRiskNepogashenAvtocredits($data, $id);
        PolicyHolder::updatePolicyHolders($page['policy_holder_id'],$request);
        Zaemshik::updateZaemshik($page['zaemshik_id'],$request);

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
