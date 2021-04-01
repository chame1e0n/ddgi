<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\PolicyInformation;
use App\Models\PolicyTransfer;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Branch;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;

class PolicyTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policyTransfer = PolicyTransfer::all();

        return view('policy_transfer.index',compact('policyTransfer'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $policySeries = PolicySeries::all();
        $branches = Branch::all();
        $agents = Agent::all();
        return view('policy_transfer.create', compact('policySeries', 'branches', 'agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $policies = Policy::where('policy_series_id', $request->policy_series_id)
            ->where('status', 'new')
            ->whereBetween('number', [$request->policy_from, $request->policy_to])
            ->get();

        if (($request->policy_to - $request->policy_from + 1) != $policies->count()) {
            return back()->withErrors([
                'В базе отсутсвуют необходимое количество полюсов'
            ]);
        }

        foreach ($policies as $policy) {
            $policy->status = 'transferred';
            $policy->save();
        }

        $policyTransfer = PolicyTransfer::create($request->all());

        $policyTransfer->policies()->attach($policies);

        return redirect()->route('policy_transfer.index')
            ->with('success','Успешно распределены полюсы');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PolicyTransfer $policyTransfer
     * @return \Illuminate\Http\Response
     */
    public function show(PolicyTransfer $policyTransfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PolicyTransfer $policyTransfer
     * @return \Illuminate\Http\Response
     */
    public function edit(PolicyTransfer $policyTransfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\PolicyTransfer $policyTransfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PolicyTransfer $policyTransfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PolicyTransfer $policyTransfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(PolicyTransfer $policyTransfer)
    {
        //
    }
}
