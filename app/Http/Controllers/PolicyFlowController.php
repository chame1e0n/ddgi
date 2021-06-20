<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\PolicyFlow;
use Illuminate\Http\Request;

class PolicyFlowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $policyFlow = PolicyFlow::filter()->paginate(15);
        $a4New = Policy::where('print_size', 'a4')->where('status', 'new')->get()->count();
        $a5New = Policy::where('print_size', 'a5')->where('status', 'new')->get()->count();
        $a4Transfered = Policy::where('print_size', 'a4')->where('status', 'transferred')->get()->count();
        $a5Transfered = Policy::where('print_size', 'a5')->where('status', 'transferred')->get()->count();

        return view('policy_flow.index',compact('policyFlow', 'a4New', 'a4Transfered', 'a5New', 'a5Transfered'));
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
