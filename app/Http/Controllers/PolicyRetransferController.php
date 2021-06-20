<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\PolicyFlow;
use App\Models\PolicyRetransfer;
use App\Models\Spravochniki\Branch;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;

class PolicyRetransferController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('policy_flow.policy_retransfer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'act_number' => 'required',
            'act_date' => 'required',
            'policy_from' => 'required',
            'policy_to' => 'required',
        ]);

        $policyFrom = $request->policy_from;
        $policyTo = $request->policy_to;

        $policies = Policy::where('policy_series_id', 0)
            ->where('status', 'transferred')
            ->where('user_id', $request->from_user_id)
            ->where('polis_name', $request->polis_name)
            ->whereBetween('number', [$policyFrom, $policyTo])
            ->get();

        if (($policyTo - $policyFrom + 1) != $policies->count()) {
            return back()->withErrors([
                'В базе отсутсвуют необходимое количество полюсов'.($policyTo - $policyFrom + 1). '!='. $policies->count()
            ]);
        }

        $toUserId = $request->to_user_id ?? null;

        if(!$toUserId) {
            // Branch director
            $toUserId = Branch::find($request->branch_id)->user_id;
        }

        $request->price_per_policy = $policies->first()->price;
        dd($request->price_per_policy);

        foreach ($policies as $policy) {
            $policy->status = 'retransferred';
            $policy->user_id = $toUserId;
            $policy->branch_id = $request->branch_id;
            $policy->save();
        }

//        PolicyFlow::createPolicyFlow($request, 'retransferred', $toUserId); ToDo::change logic and delete this line

        return redirect()->route('policy_flow.index')
            ->with('success','Полисы успешно перерапределены');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PolicyRetransfer  $policyRetransfer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PolicyRetransfer  $policyRetransfer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $policy = PolicyFlow::findOrFail($id);

        return view('policy_flow.policy_transfer.edit', compact('policy'));
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
    public function destroy($id)
    {
        $policy = PolicyFlow::findOrFail($id);
        $policy->delete();

        return redirect()->route('policy_flow.index')
            ->with('success', sprintf('Дынные о движении были успешно удалены'));

    }
}
