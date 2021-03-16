<?php

namespace App\Http\Controllers\Product;

use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Product\CreditNepogashen;
use App\Models\Zaemshik;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreditNepogashenController extends Controller
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
        $agents = Agent::all();
        return view('products.credit.nepogashen.create', compact('banks', 'agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data                       = $request->all();
        $newPolicyHolders           = PolicyHolder::createPolicyHolders($request);
        if(!$newPolicyHolders)
        return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
        $newZaemshik                = Zaemshik::createZaemshik($request);
        if(!$newZaemshik)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении newZaemshik')]);
        $data['policy_holder_id']   = $newPolicyHolders->id;
        $data['zaemshik_id']        = $newZaemshik->id;
        $newCreditNePogashen        = CreditNepogashen::createCreditNePogashen($data);

        if($newCreditNePogashen)
            return back()->withInput()->with([sprintf('Продукт успешно добавлен')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product\CreditNepogashen  $creditNepogashen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banks      = Bank::getBanks();
        $agents     = Agent::all();
        $credit     = CreditNepogashen::getInfoCredit($id);
        return view('products.credit.nepogashen.show', compact('banks', 'agents', 'credit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product\CreditNepogashen  $creditNepogashen
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $banks      = Bank::getBanks();
        $agents     = Agent::all();
        $credit     = CreditNepogashen::getInfoCredit($id);
        return view('products.credit.nepogashen.edit', compact('banks', 'agents', 'credit'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product\CreditNepogashen  $creditNepogashen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $credit = CreditNepogashen::find($id);
        $creditUpdate = CreditNepogashen::updateCreditNePogashen($id, $data);
        $zaemshikUpdate = Zaemshik::updateZaemshik($credit->zaemshik_id, $request);
        $policyHolderUpdate = PolicyHolder::updatePolicyHolders($credit->policy_holder_id, $request);

        return back()->withInput()->with([sprintf('Данные успешно обновлены')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product\CreditNepogashen  $creditNepogashen
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditNepogashen $creditNepogashen)
    {
        //
    }
}
