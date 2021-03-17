<?php

namespace App\Http\Controllers\Product;

use App\Models\PolicyHolder;
use App\Models\Product\CrediFinRiskNepogashenAvtocredit;
use App\Models\Product\CreditFinRiskNepogashenCredit;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Zaemshik;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreditFinRiskNepogashenCreditController extends Controller
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
        return view('products.credit-fin-risk.nepogashen_credit.create', compact('banks', 'agents'));
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

        CreditFinRiskNepogashenCredit::UpdateOrCreateCreditFinRiskNepogashenCredits($data);

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
        $page = CreditFinRiskNepogashenCredit::with('policyHolders','zaemshik')->findOrFail($id);
        $banks = Bank::getBanks();
        $agents = Agent::getActiveAgent();
        return view('products.credit-fin-risk.nepogashen_credit.show', compact('banks', 'agents', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = CreditFinRiskNepogashenCredit::with('policyHolders','zaemshik')->findOrFail($id);
        $banks = Bank::getBanks();
        $agents = Agent::getActiveAgent();
        return view('products.credit-fin-risk.nepogashen_credit.edit', compact('banks', 'agents', 'page'));
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
        $page = CreditFinRiskNepogashenCredit::UpdateOrCreateCreditFinRiskNepogashenCredits($data, $id);
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
