<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Allproduct;
use App\Models\AllProductImushestvoInfo;
use App\Models\AllProductsTermsTranshes;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Zalogodatel;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;

class ZalogTehnikaController extends Controller
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
        return view('products.zalog.tehnika.create', compact('banks', 'agents', 'policySeries'));
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

        $newZalogodatel     = Zalogodatel::createZalogodatel($request);
        if(!$newZalogodatel)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newPolicyBeneficiaries')]);

        $newProduct = Allproduct::createAllProduct($request,$newPolicyHolders->id, $newPolicyBeneficiaries->id, $newZalogodatel->id);

        AllProductImushestvoInfo::create($newProduct->id, $request);
        AllProductsTermsTranshes::create($newProduct->id, $request);
        if(!$newProduct)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newProduct')]);


        return redirect()->route('zalog-tehnika.edit', $newProduct->id)->withInput()->with([sprintf('Данные успешно добавлены')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('products.zalog.tehnika.edit', compact('banks', 'agents', 'page', 'policySeries'));
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
        //
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
