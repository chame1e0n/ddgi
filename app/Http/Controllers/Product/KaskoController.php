<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\KascoRequest;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Product\KascoStrahPremiya;
use App\Models\Product\Kasko;
use App\Models\Product\KaskoModel;
use App\Models\Product\KaskoPolicyInformationModel;
use App\Models\Product\OtvetstvennostOtsenshiki;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;

class KaskoController extends Controller
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
        $agents = Agent::getActiveAgent();
        $banks = Bank::getBanks();
        $policySeries =  PolicySeries::get();
        return view('products.kasko.create', compact('agents', 'banks', 'policySeries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KascoRequest $request)
    {

        $policyHolder        = PolicyHolder::createPolicyHolders($request);
        $policyBeneficiaries = PolicyBeneficiaries::createPolicyBeneficiaries($request);
        $kasko               = KaskoModel::createKasko($request, $policyHolder->id,$policyBeneficiaries->id);
                               KaskoPolicyInformationModel::createPolicyInfo($request,$kasko->id);
                               KascoStrahPremiya::createStrahPremiya($request,$kasko->id);

        return redirect(route('kasco-add.edit', $kasko->id));

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
        $agents = Agent::getActiveAgent();
        $banks = Bank::getBanks();
        $policySeries =  PolicySeries::get();
        $page = KaskoModel::with('PolicyBeneficiaries','policyHolders', 'policyInformations', 'KascoStrahPremiya')->find($id);
        return view('products.kasko.edit', compact('agents', 'banks', 'policySeries', 'page'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KascoRequest $request, $id)
    {
        $policyHolder        = PolicyHolder::updatePolicyHolders($id, $request);
        $policyBeneficiaries = PolicyBeneficiaries::updatePolicyBeneficiaries($id,$request);
        $kasko               = KaskoModel::updateKasco($request, $policyHolder->id,$policyBeneficiaries->id, $id);
                               KaskoPolicyInformationModel::updateePolicyInfo($request,$kasko);
                               KascoStrahPremiya::updateStrahPremiya($request,$kasko);

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
