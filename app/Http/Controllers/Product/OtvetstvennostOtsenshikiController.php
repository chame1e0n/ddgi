<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtvetstvennostOtsenshikiRequest;
use App\Models\PolicyHolder;
use App\Models\Product\OtvetstvennostOtsenshiki;
use App\Models\Product\OtvetstvennostOtsenshikiInfo;
use App\Models\Product\OtvetstvennostOtsenshikiStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $agents = Agent::getActiveAgent();
        $banks = Bank::getBanks();
        $policySeries = PolicySeries::get();
        return view('products.otvetstvennost.otsenshiki.create', compact('banks', 'agents', 'policySeries'));
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
        $page = OtvetstvennostOtsenshiki::with('strahPremiya', 'policyHolders', 'infos')->find($id);

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
