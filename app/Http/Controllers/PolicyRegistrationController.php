<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\PolicyRegistration;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PolicyRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policies = Policy::latest()->paginate(5);

        return view('policy_registration.index',compact('policies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $policySeries = PolicySeries::all();

        return view('policy_registration.create', compact('policySeries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'act_number' => 'required',
            'act_date' => 'required',
            'from_number' => 'required',
            'to_number' => 'required',
            'policy_series_id' => 'required',
        ]);
        $policySeriesId = $request->policy_series_id;
        $existRangeOfSeries1 = PolicyRegistration::select('id')
            ->whereBetween('from_number', [$request->from_number, $request->to_number])
            ->where('act_number', $request->act_number)
            ->where('policy_series_id', $policySeriesId)
            ->get()->count();

        $existRangeOfSeries2 = PolicyRegistration::select('id')
            ->whereBetween('to_number', [$request->from_number, $request->to_number])
            ->where('act_number', $request->act_number)
            ->where('policy_series_id', $policySeriesId)
            ->get()->count();

        if ($existRangeOfSeries1 or $existRangeOfSeries2) {
            return back()->withErrors([
                sprintf('В базе присутствуют полностью или чистично полиса от %s до %s',
                    $request->from_number,
                    $request->to_number
                )
            ]);
        }

        for ($i = $request->from_number; $i <= $request->to_number; $i++) {
            $policy = new Policy;
            $policy->number = $i;
            $policy->act_number = $request->act_number;
            $policy->policy_series_id = $policySeriesId;
            $policy->status = 'new';
            $policy->save();
        }

        PolicyRegistration::create($request->all());

        return redirect()->route('policy_registration.index')
            ->with('success', 'Успешно добавлены новые полисы');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PolicyRegistration $policyRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(PolicyRegistration $policyRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PolicyRegistration $policyRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(PolicyRegistration $policyRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\PolicyRegistration $policyRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PolicyRegistration $policyRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PolicyRegistration $policyRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(PolicyRegistration $policyRegistration)
    {
        //
    }
}
