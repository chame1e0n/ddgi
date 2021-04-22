<?php

namespace App\Http\Controllers;

use App\Models\PolicyFlow;
use Illuminate\Http\Request;

class PolicyFlowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policyFlow = PolicyFlow::latest()->paginate(15);

        return view('policy_flow.index',compact('policyFlow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\PolicyFlow  $policyFlow
     * @return \Illuminate\Http\Response
     */
    public function show(PolicyFlow $policyFlow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PolicyFlow  $policyFlow
     * @return \Illuminate\Http\Response
     */
    public function edit(PolicyFlow $policyFlow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PolicyFlow  $policyFlow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PolicyFlow $policyFlow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PolicyFlow  $policyFlow
     * @return \Illuminate\Http\Response
     */
    public function destroy(PolicyFlow $policyFlow)
    {
        //
    }
}
