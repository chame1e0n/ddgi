<?php

namespace App\Http\Controllers;

use App\AllProduct;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Branch;
use Illuminate\Http\Request;

class PolicyFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $all_products = AllProduct::query()->with('policyHolder', 'policyBeneficiaries','zaemshik', 'allProductCurrencyTerms', 'allProductInfo', 'branches')->paginate(15);
        $agents = Agent::query()->get();
        $branches = Branch::query()->get();
        return view('filters.policy_filter_index', compact('all_products', 'agents', 'branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function filter(Request $request)
    {
        $all_products = AllProduct::query()->filter()->with('policyHolder', 'policyBeneficiaries','zaemshik', 'allProductCurrencyTerms', 'allProductInfo', 'branches')->paginate(15);
        $agents = Agent::query()->get();
        $branches = Branch::query()->get();
        return view('filters.policy_filter_index', compact('all_products', 'agents', 'branches'));
    }
}
