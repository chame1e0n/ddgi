<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\PolicyFlow;
use App\Models\PolicyInformation;
use App\Models\PolicyTransfer;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Branch;
use App\Models\Spravochniki\PolicySeries;
use App\User;
use Illuminate\Http\Request;

class PolicyTransferController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('policy_flow.policy_transfer.create');
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
        ]);

        $policyFrom = $request->policy_from;
        $policyTo = $request->policy_to;

        $policies = Policy::where('status', 'new')
            ->where('user_id', $request->from_user_id)
            ->where('polis_name', $request->polis_name)
            ->whereBetween('number', [$policyFrom, $policyTo])
            ->get();

        if (($policyTo - $policyFrom + 1) != $policies->count()) {
            return back()->withErrors([
                'В базе отсутсвуют необходимое количество полюсов '
            ])->withInput($request->all());
        }

        $toUserId = $request->to_user_id ?? null;

        if(!$toUserId) {
            // Branch director
            $toUserId = Branch::find($request->branch_id)->user_id;
        }
        $request->price_per_policy = $policies->first()->price;

        foreach ($policies as $policy) {
            $policy->status = 'pending_transfer';
            $policy->user_id = $toUserId;
            $policy->branch_id = $request->branch_id;
            $policy->save();
        }

//        PolicyFlow::createPolicyFlow($request, 'pending_transfer', $toUserId); ToDo::change logic and delete this line

        return redirect()->route('policy_flow.index')
            ->with('success','Успешно полюсы были направлены на подтвержение распределения');
    }

    public function confirm(Request $request, $id)
    {
        $request->validate([
            'confirmation' => 'required',
        ]);

        $policyTransfer = PolicyFlow::findOrFail($id);

        $policyFrom = $policyTransfer->policy_from;
        $policyTo = $policyTransfer->policy_to;

        $policies = Policy::where('policy_series_id', 0)
            ->where('status', 'pending_transfer')
            ->where('user_id', $policyTransfer->to_user_id)
            ->where('polis_name', $policyTransfer->polis_name)
            ->whereBetween('number', [$policyFrom, $policyTo])
            ->get();

        if (($policyTo - $policyFrom + 1) != $policies->count()) {
            return back()->withErrors([
                sprintf('В базе отсутсвуют частично или полностью серии полисов от %s до %s', $policyFrom, $policyTo)
            ]);
        }

        $accepted = $request->confirmation == 'Да';
        $transferUserId = $accepted ? $policyTransfer->toUser->id : $policyTransfer->fromUser->id;
        $transferBranchId = $accepted ? $policyTransfer->toUser->branch_id : $policyTransfer->fromUser->branch_id;

        foreach ($policies as $pol) {
            $pol->status = $accepted ? 'transferred' : 'new';
            $pol->user_id = $transferUserId;
            $pol->branch_id = $transferBranchId;
            $pol->save();
        }

        PolicyFlow::updatePolicyFlowStatus($id, $accepted ? 'transferred' : 'rejected_transfer');

        return redirect()->route('policy_flow.index')
            ->with('success','Успешно обновилен статус полюсов на \'Распределен\'');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PolicyTransfer $policyTransfer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PolicyTransfer $policyTransfer
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
    public function destroy($id)
    {
        $policy = PolicyFlow::findOrFail($id);
        $policy->delete();

        return redirect()->route('policy_flow.index')
            ->with('success', sprintf('Дынные о движении были успешно удалены'));

    }
}
