<?php

namespace App\Http\Controllers;

use App\Model\Policy;
use App\Model\PolicyFlow;
use Illuminate\Http\Request;

class PolicyFlowController extends Controller
{
    /**
     * Display a list of all policy flows.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter_data = $request->has('filter') ? $request['filter'] : [];

        $query = PolicyFlow::select('policy_flows.*')
            ->crossJoin('policies', 'policy_flows.policy_id', '=', 'policies.id');

        if (isset($filter_data['status']) && !empty($filter_data['status'])) {
            $query->where('policy_flows.status', '=', $filter_data['status']);
        }
        if (isset($filter_data['act_date']) && !empty($filter_data['act_date'])) {
            $query->where('policy_flows.act_date', '=', $filter_data['act_date']);
        }
        if (isset($filter_data['policy']['act_number']) && !empty($filter_data['policy']['act_number'])) {
            $query->where('policies.act_number', '=', $filter_data['policy']['act_number']);
        }
        if (isset($filter_data['from']['value']) && !empty($filter_data['from']['value'])) {
            $query->where('policies.series', $filter_data['from']['sign'], $filter_data['from']['value']);
        }
        if (isset($filter_data['to']['value']) && !empty($filter_data['to']['value'])) {
            $query->where('policies.series', $filter_data['to']['sign'], $filter_data['to']['value']);
        }
        if (isset($filter_data['from_employee_id']) && !empty($filter_data['from_employee_id'])) {
            $query->where('policy_flows.from_employee_id', '=', $filter_data['from_employee_id']);
        }
        if (isset($filter_data['to_employee_id']) && !empty($filter_data['to_employee_id'])) {
            $query->where('policy_flows.to_employee_id', '=', $filter_data['to_employee_id']);
        }

        return view('policy_flow.index', [
            'policy_flows' => $query->get(),
        ]);
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
