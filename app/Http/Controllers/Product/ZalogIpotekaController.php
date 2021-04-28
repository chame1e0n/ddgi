<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Allproduct;
use App\Models\AllProductImushestvoInfo;
use App\Models\AllProductsTermsTranshes;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;

class ZalogIpotekaController extends Controller
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
        return view('products.zalog.ipoteka.create', compact('banks', 'agents', 'policySeries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPolicyHolders           = PolicyHolder::createPolicyHolders($request);
        if(!$newPolicyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
        $newPolicyBeneficiaries     = PolicyBeneficiaries::createPolicyBeneficiaries($request);
        if(!$newPolicyBeneficiaries)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newPolicyBeneficiaries')]);

        $newZalogIpoteka = Allproduct::createAllProduct($request,$newPolicyHolders->id, $newPolicyBeneficiaries->id);

        AllProductImushestvoInfo::create($newZalogIpoteka->id, $request);
        AllProductsTermsTranshes::create($newZalogIpoteka->id, $request);
        if(!$newZalogIpoteka)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newZalogIpoteka')]);


        return redirect()->route('zalog-ipoteka.edit', $newZalogIpoteka->id)->withInput()->with([sprintf('Данные успешно добавлены')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Allproduct::with('policyHolders', 'policyBeneficiaries', 'infos', 'strahPremiya')->find($id);

        $banks = Bank::all();
        $agents = Agent::all();
        $policySeries = PolicySeries::all();
        return view('products.zalog.ipoteka.show', compact('banks', 'agents', 'page', 'policySeries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Allproduct::with('policyHolders', 'policyBeneficiaries', 'infos', 'strahPremiya')->find($id);

        $banks = Bank::all();
        $agents = Agent::all();
        $policySeries = PolicySeries::all();
        return view('products.zalog.ipoteka.edit', compact('banks', 'agents', 'page', 'policySeries'));
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
        $product = Allproduct::findOrFail($id);
        $policyHolders = PolicyHolder::updatePolicyHolders($product->policy_holder_id, $request);
        if (!$policyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при обновлении PolicyHolders')]);
        $policyBeneficiaries = PolicyBeneficiaries::updatePolicyBeneficiaries($product->policy_beneficiaries_id, $request);
        if (!$policyBeneficiaries)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newPolicyBeneficiaries')]);

        $product = Allproduct::updateAllProduct($id, $request);
        if (!$product)
            return back()->withInput()->withErrors([sprintf('Ошибка при обновлении $product')]);

        AllProductImushestvoInfo::updateInfo($product, $request);
        AllProductsTermsTranshes::updateTermsTranshes($product, $request);
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
