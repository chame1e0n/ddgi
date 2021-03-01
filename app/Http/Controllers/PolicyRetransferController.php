<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\PolicyRetransfer;
use App\Models\Spravochniki\Branch;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;

class PolicyRetransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policyRetransfer = PolicyRetransfer::latest()->paginate(5);

        return view('policy_retransfer.index',compact('policyRetransfer'))
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

        return view('policy_retransfer.create', compact('policySeries', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $policies = Policy::where('policy_series_id', $request->policy_series_id)
            ->where('status', 'transferred')
            ->whereBetween('number', [$request->policy_from, $request->policy_to])
            ->get();

        if (($request->policy_to - $request->policy_from + 1) != $policies->count()) {
            return back()->withErrors([
                'В базе отсутсвуют необходимое количество полюсов'
            ]);
        }

        foreach ($policies as $policy) {
            $policy->status = 'retransferred';
            $policy->save();
        }

        $policyRetransfer = PolicyRetransfer::create($request->all());

        $policyRetransfer->policies()->attach($policies);

        return redirect()->route('policy_retransfer.index')
            ->with('success','Успешно перераспределены полюсы');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PolicyRetransfer  $policyRetransfer
     * @return \Illuminate\Http\Response
     */
    public function show(PolicyRetransfer $policyRetransfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PolicyRetransfer  $policyRetransfer
     * @return \Illuminate\Http\Response
     */
    public function edit(PolicyRetransfer $policyRetransfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PolicyRetransfer  $policyRetransfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PolicyRetransfer $policyRetransfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PolicyRetransfer  $policyRetransfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(PolicyRetransfer $policyRetransfer)
    {
        //
    }
}
