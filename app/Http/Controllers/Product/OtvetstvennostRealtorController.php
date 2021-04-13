<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\OtvetstvennostRealtorRequest;
use App\Models\PolicyHolder;
use App\Models\Product\OtvetstvennostRealtorInfo;
use App\Models\Product\OtvetstvennostRealtorStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use \App\Models\Product\OtvetstvennostRealtor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class OtvetstvennostRealtorController extends Controller
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
        return view('products.otvetstvennost.realtor.create', compact('banks', 'agents', 'policySeries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OtvetstvennostRealtorRequest $request)
    {
        $newPolicyHolders           = PolicyHolder::createPolicyHolders($request);
        if(!$newPolicyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
        $realtor = OtvetstvennostRealtor::createRealtor($request, $newPolicyHolders->id);
        OtvetstvennostRealtorInfo::createRealtorInfo($request, $realtor->id);
        OtvetstvennostRealtorStrahPremiya::createRealtorStrahPremiya($request, $realtor->id);
        return redirect(route('otvetstvennost-realtor.edit', $realtor->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agents = Agent::getActiveAgent();
        $banks = Bank::getBanks();
        $policySeries =  PolicySeries::get();
        $page = OtvetstvennostRealtor::with('strahPremiya','policyHolders','infos')->find($id);
//        dd($page);
        return view('products.otvetstvennost.realtor.show', compact('banks', 'agents', 'policySeries', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agents = Agent::getActiveAgent();
        $banks = Bank::getBanks();
        $policySeries =  PolicySeries::get();
        $page = OtvetstvennostRealtor::with('strahPremiya','policyHolders','infos')->find($id);
//        dd($page);
        return view('products.otvetstvennost.realtor.edit', compact('banks', 'agents', 'policySeries', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OtvetstvennostRealtorRequest $request, $id)
    {
        $realtor   = OtvetstvennostRealtor::updateRealtor($request,$id);
        $polycyHolder = PolicyHolder::updatePolicyHolders($realtor->policy_holder_id, $request);
        OtvetstvennostRealtorInfo::updateRealtorInfo($request, $realtor);
        OtvetstvennostRealtorStrahPremiya::updateRealtorStrahPremiya($request, $realtor);

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
