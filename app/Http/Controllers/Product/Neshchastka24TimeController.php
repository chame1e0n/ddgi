<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\Neshchastka24TimeRequest;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Product\Neshchastka24Time;
use App\Models\Product\Neshchastka24timeInformation;
use App\Models\Product\Neshchastka24TimeStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Neshchastka24TimeController extends Controller
{
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
        $polis_series = PolicySeries::get();
        return view('products.neshchastka.24time.create', compact('banks', 'agents' , 'polis_series'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Neshchastka24TimeRequest $request)
    {
//        dd($request->all());
        $p = PolicyHolder::createPolicyHolders($request);
        $b = PolicyBeneficiaries::createPolicyBeneficiaries($request);

        $time = Neshchastka24Time::createTime($p,$b,$request);
        Neshchastka24TimeStrahPremiya::createStrah($time,$request);
        Neshchastka24timeInformation::createInfo($time,$request);

        return redirect(route('neshchastka-time.edit', $time->id));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Neshchastka24Time::with('StrahPremiya', 'policyHolders', 'PolicyBeneficiaries', 'policyInformations')->find($id);
        $banks = Bank::getBanks();
        $agents = Agent::getActiveAgent();
        $polis_series = PolicySeries::get();
        return view('products.neshchastka.24time.show', compact('page', 'banks', 'agents', 'polis_series'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Neshchastka24Time::with('StrahPremiya', 'policyHolders', 'PolicyBeneficiaries', 'policyInformations')->find($id);
//        dd($page);
        $banks = Bank::getBanks();
        $agents = Agent::getActiveAgent();
        $polis_series = PolicySeries::get();
        return view('products.neshchastka.24time.edit', compact('banks', 'agents', 'page', 'polis_series'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Neshchastka24TimeRequest $request, $id)
    {
        $time = Neshchastka24Time::updateTime($request, $id);

        $p = PolicyHolder::updatePolicyHolders($time->policy_holder_id,$request);
        $b = PolicyBeneficiaries::updatePolicyBeneficiaries($time->policy_beneficiary_id,$request);


        Neshchastka24TimeStrahPremiya::updateStrah($time,$request);
        Neshchastka24timeInformation::updateInfo($time,$request);

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
