<?php

namespace App\Http\Controllers;

use App\Model\Policy;
use App\Model\PolicyFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
     * Show a form to create a new policy flows.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('policy_flow.create', [
            'policy_flow' => new PolicyFlow(),
        ]);
    }

    /**
     * Store a new policy flows.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(array_merge(PolicyFlow::$validate, [
            'name' => 'required',
            'policy_series_from' => 'required',
            'policy_series_to' => 'required',
        ]));

        $policies = Policy::where('name', '=', $request['name'])
            ->whereBetween('series', [$request['policy_series_from'], $request['policy_series_to']])
            ->get();

        $files = [];
        foreach($request['files'] as $file) {
            $files[] = [
                'type' => 'document',
                'original_name' => $file->getClientOriginalName(),
                'path' => Storage::putFile('public/policy_flow', $file),
            ];
        }

        foreach($policies as /* @var $policy Policy */ $policy) {
            foreach($policy->policy_flows as /* @var $policy_flow PolicyFlow */ $policy_flow) {
                $policy_flow->delete();
            }

            $policy_flow_data = $request['policy_flow'];
            $policy_flow_data['policy_id'] = $policy->id;
            $policy_flow_data['status'] = PolicyFlow::STATUS_TRANSFERRED;

            $policy_flow = PolicyFlow::create($policy_flow_data);
            $policy_flow->files()->createMany($files);
        }

        return redirect()->route('policy_flows.index')
                         ->with('success', 'Успешно произведены перемещения существующих полисов');
    }

    /**
     * Display an existing policy flow.
     *
     * @param  \App\Model\PolicyFlow $policy_flow
     * @return \Illuminate\Http\Response
     */
    public function show(PolicyFlow $policy_flow)
    {
        return view('policy_flow.form', [
            'block' => true,
            'policy_flow' => $policy_flow,
        ]);
    }

    /**
     * Show a form to edit existing policy flow.
     *
     * @param  \App\Model\PolicyFlow $policy_flow
     * @return \Illuminate\Http\Response
     */
    public function edit(PolicyFlow $policy_flow)
    {
        return view('policy_flow.form', [
            'block' => false,
            'policy_flow' => $policy_flow,
        ]);
    }

    /**
     * Update an existing policy flow.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\PolicyFlow    $policy_flow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PolicyFlow $policy_flow)
    {
        $request->validate(PolicyFlow::$validate);

        $policy_flow->fill($request['policy_flow']);
        $policy_flow->save();

        if (count($request['files']) > 0) {
            $files = [];
            foreach($request['files'] as $file) {
                $files[] = [
                    'type' => 'document',
                    'original_name' => $file->getClientOriginalName(),
                    'path' => Storage::putFile('public/policy', $file),
                ];
            }

            $policy_flow->files()->delete();
            $policy_flow->files()->createMany($files);
        }

        return redirect()->route('policy_flows.index')
                         ->with('success', sprintf('Данные о движении полиса \'%s\' были успешно обновлены', $policy_flow->id));
    }

    /**
     * Destroy an existing policy flow.
     * 
     * @param \App\Model\PolicyFlow $policy_flow
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(PolicyFlow $policy_flow)
    {
        $policy_flow->delete();

        return redirect()->route('policy_flows.index')
                         ->with('success', sprintf('Данные о движении полиса \'%s\' были успешно удалены', $policy_flow->id));
    }
}
