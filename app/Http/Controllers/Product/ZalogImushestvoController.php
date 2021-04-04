<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ZalogImushestvoRequest;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Product\ZalogImushestvo;
use App\Models\Product\ZalogImushestvoInfo;
use App\Models\Product\ZalogImushestvoStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;

class ZalogImushestvoController extends Controller
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
        return view('products.zalog.imushestvo.create', compact('banks', 'agents', 'policySeries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZalogImushestvoRequest $request)
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
            $image          = $request->file('copy_passport')->store('/img/ZalogImushestvo', 'public');
            $request->copy_passport   = $image;
        }
        if ($request->hasFile('copy_dogovor')) {
            $image          = $request->file('copy_dogovor')->store('/img/ZalogImushestvo', 'public');
            $request->copy_dogovor   = $image;
        }
        if ($request->hasFile('copy_spravki')) {
            $image          = $request->file('copy_spravki')->store('/img/ZalogImushestvo', 'public');
            $request->copy_spravki   = $image;
        }
        if ($request->hasFile('copy_drugie')) {
            $image          = $request->file('copy_drugie')->store('/img/ZalogImushestvo', 'public');
            $request->copy_drugie   = $image;
        }

        $newZalogImushestvo = ZalogImushestvo::createZalogImushestvo($request);
        $newZalogImushestvoInfo = ZalogImushestvoInfo::createZalogImushestvoInfo($request, $newZalogImushestvo);
        ZalogImushestvoStrahPremiya::createImushestvoStrahPremiya($request, $newZalogImushestvo->id);
        if(!$newZalogImushestvo)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newZalogImushestvo')]);

        return redirect()->route('zalog-imushestvo.edit', $newZalogImushestvo->id)->withInput()->with([sprintf('Данные успешно добавлены')]);
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
        $page = ZalogImushestvo::getInfoZalogImushestvo($id);
        $banks = Bank::all();
        $agents = Agent::all();
        $policySeries = PolicySeries::all();
        return view('products.zalog.imushestvo.edit', compact('banks', 'agents', 'page', 'policySeries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ZalogImushestvoRequest $request, $id)
    {
        $zalogImushestvo = ZalogImushestvo::findOrFail($id);
        $policyHolders = PolicyHolder::updatePolicyHolders($zalogImushestvo->policy_holder_id, $request);
        if (!$policyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при обновлении PolicyHolders')]);
        $policyBeneficiaries = PolicyBeneficiaries::updatePolicyBeneficiaries($zalogImushestvo->policy_beneficiary_id, $request);
        if (!$policyBeneficiaries)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newPolicyBeneficiaries')]);

        $request->policy_holder_id = $policyHolders->id;
        $request->policy_beneficiary_id = $policyBeneficiaries->id;
        if ($request->hasFile('anketa_img')) {
            $image = $request->file('anketa_img')->store('/img/PolicyHolder', 'public');
            $request->anketa_img = $image;
        } else
            $request->anketa_img = $zalogImushestvo->anketa_img;

        if ($request->hasFile('dogovor_img')) {
            $image = $request->file('dogovor_img')->store('/img/PolicyHolder', 'public');
            $request->dogovor_img = $image;
        } else
            $request->dogovor_img = $zalogImushestvo->dogovor_img;

        if ($request->hasFile('polis_img')) {
            $image = $request->file('polis_img')->store('/img/PolicyHolder', 'public');
            $request->polis_img = $image;
        } else
            $request->polis_img = $zalogImushestvo->polis_img;

        if ($request->hasFile('copy_passport')) {
            $image          = $request->file('copy_passport')->store('/img/ZalogImushestvo', 'public');
            $request->copy_passport   = $image;
        } else
            $request->copy_passport = $zalogImushestvo->copy_passport;

        if ($request->hasFile('copy_dogovor')) {
            $image          = $request->file('copy_dogovor')->store('/img/ZalogImushestvo', 'public');
            $request->copy_dogovor   = $image;
        } else
            $request->copy_dogovor = $zalogImushestvo->copy_dogovor;

        if ($request->hasFile('copy_spravki')) {
            $image          = $request->file('copy_spravki')->store('/img/ZalogImushestvo', 'public');
            $request->copy_spravki   = $image;
        } else
            $request->copy_spravki = $zalogImushestvo->copy_spravki;

        if ($request->hasFile('copy_drugie')) {
            $image          = $request->file('copy_drugie')->store('/img/ZalogImushestvo', 'public');
            $request->copy_drugie   = $image;
        } else
            $request->copy_drugie = $zalogImushestvo->copy_drugie;
        $zalogImushestvo = ZalogImushestvo::updateZalogImushestvo($id, $request);
        $zalogImushestvoInfo = ZalogImushestvoInfo::updateZalogImushestvoInfo($request, $zalogImushestvo);
        ZalogImushestvoStrahPremiya::updateImushestvoStrahPremiya($request, $zalogImushestvo);
        if (!$zalogImushestvo)
            return back()->withInput()->withErrors([sprintf('Ошибка при обновлении $zalogImushestvo')]);

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
