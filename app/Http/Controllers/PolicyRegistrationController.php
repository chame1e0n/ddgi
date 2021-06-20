<?php

namespace App\Http\Controllers;

use App\Model\Policy;
use App\Model\PolicyFlow;
use App\Models\PolicyFlowFile;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PolicyRegistrationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('policy_flow.policy_registration.create');
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
            'policy_from' => 'required',
            'policy_to' => 'required',
            'polis_name' => 'required',
            'price_per_policy' => 'required',
        ]);

        $policyFrom = $request->policy_from;
        $policyTo = $request->policy_to;

        $existRangeOfSeries = Policy::select('id')
            ->whereBetween('series', [$policyFrom, $policyTo])
            ->where('act_number', $request->act_number)
            ->where('name', $request->polis_name)
            ->get()->count();

        if ($existRangeOfSeries) {
            return back()->withErrors([
                sprintf('В базе присутствуют полностью или чистично полиса от %s до %s с наименованием %s',
                    $policyFrom,
                    $policyTo,
                    $request->polis_name
                )
            ]);
        }

        PolicyFlow::createNewPoliciesAndPolicyFlows($request);

        return redirect()->route('policy_flow.index')
            ->with('success', 'Успешно добавлены новые полисы');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PolicyRegistration $policyRegistration
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PolicyFlow $policyRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $policy = PolicyFlow::findOrFail($id);

        return view('policy_flow.policy_registration.edit', compact('policy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param PolicyFlow $policyFlow
     * @return
     */
    public function update(Request $request, $id)
    {
        $policyFlow = PolicyFlow::findOrFail($id);
        $policyFrom = $policyFlow->policy_from;
        $policyTo = $policyFlow->policy_to;

        $policiesAlreadyInUse = Policy::select('id')
            ->whereBetween('number', [$policyFrom, $policyTo])
            ->where('status', '!=', 'new')
            ->where('polis_name', $policyFlow->polis_name)
            ->where('policy_series_id','0')
            ->get()->count();

        if ($policiesAlreadyInUse) {
            return back()->withErrors([
                sprintf('Полиса от %s до %s уже используются',
                    $policyFrom,
                    $policyTo
                )
            ]);
        }

        for ($i = $policyFrom; $i<=$policyTo; $i++) {
            Policy::whereBetween('number', [$policyFrom, $policyTo])->delete();
        }

        PolicyFlow::createNewPolicies($request);
        PolicyFlow::updatePolicyFlow($request, $id, 'registered');

        return redirect()->route('policy_registration.edit')
            ->with('success', sprintf('Дынные о полисах были успешно обновлены'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PolicyRegistration $policyRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $policy = PolicyFlow::findOrFail($id);
        $policy->delete();

        return redirect()->route('policy_flow.index')
            ->with('success', sprintf('Дынные о движении были успешно удалены'));

    }
}
