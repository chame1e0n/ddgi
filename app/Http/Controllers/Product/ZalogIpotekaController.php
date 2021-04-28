<?php

namespace App\Http\Controllers\Product;

use App\AllProductImushestvoInfo;
use App\Http\Controllers\Controller;
use App\Models\Allproduct;
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

        if ($request->hasFile('copy_passport')) {
            $image          = $request->file('copy_passport')->store('/img/ZalogImushestvo3x', 'public');
            $request->copy_passport   = $image;
        }
        if ($request->hasFile('copy_dogovor')) {
            $image          = $request->file('copy_dogovor')->store('/img/ZalogImushestvo3x', 'public');
            $request->copy_dogovor   = $image;
        }
        if ($request->hasFile('copy_spravki')) {
            $image          = $request->file('copy_spravki')->store('/img/ZalogImushestvo3x', 'public');
            $request->copy_spravki   = $image;
        }
        if ($request->hasFile('copy_drugie')) {
            $image          = $request->file('copy_drugie')->store('/img/ZalogImushestvo3x', 'public');
            $request->copy_drugie   = $image;
        }

        $newZalogIpoteka = Allproduct::createZalogIpoteka($request);
        $newZalogImushestvoInfo = AllProductImushestvoInfo::create($newZalogIpoteka->id, $request);
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
        //
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
