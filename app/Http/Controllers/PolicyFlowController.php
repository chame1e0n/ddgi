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
        $policy = new Policy();
        $policy->print_size = Policy::PRINT_SIZE_A4;

        return view('policy_flow.create', [
            'policy' => $policy,
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
        $request->validate(array_merge(
            Policy::$validate,
            PolicyFlow::$validate,
            ['policy_series_from' => 'required', 'policy_series_to' => 'required'],
        ));

        $policy_data = $request['policy'];
        $policy_flow_data = $request['policy_flow'];
        $policy_series_from = $request['policy_series_from'];
        $policy_series_to = $request['policy_series_to'];

        $existing_policies = Policy::select('id')
            ->whereBetween('series', [$policy_series_from, $policy_series_to])
            ->where('act_number', $policy_data['act_number'])
            ->where('name', $policy_data['name'])
            ->get();

        if ($existing_policies->count() > 0) {
            return back()->withErrors([
                sprintf(
                    'В базе присутствуют полностью или чистично полиса от %s до %s с наименованием %s',
                    $policy_series_from,
                    $policy_series_to,
                    $policy_data['name']
                )
            ]);
        }

        $employee = Auth::user()->employees->first();

        $files = [];
        foreach($request['files'] as $file) {
            $files[] = [
                'type' => 'document',
                'original_name' => $file->getClientOriginalName(),
                'path' => Storage::putFile('public/policy_flow', $file),
            ];
        }

        for ($i = $policy_series_from; $i <= $policy_series_to; $i++) {
            $policy_data['employee_id'] = $employee->id;
            $policy_data['series'] = $i;
            $policy_data['status'] = PolicyFlow::STATUS_REGISTERED;
            $policy_data['date_of_issue'] = date('Y-m-d');

            $policy = Policy::create($policy_data);

            $policy_flow_data['branch_id'] = $employee->branch_id;
            $policy_flow_data['policy_id'] = $policy->id;
            $policy_flow_data['status'] = PolicyFlow::STATUS_REGISTERED;

            $policy_flow = PolicyFlow::create($policy_flow_data);
            $policy_flow->files()->createMany($files);
        }

        return redirect()->route('policy_flows.index')
                         ->with('success', 'Успешно добавлены новые движения полисов');
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
        $policy_flow->policy->delete();

        return redirect()->route('policy_flows.index')
                         ->with('success', sprintf('Данные о движении полиса \'%s\' были успешно удалены', $policy_flow->id));
    }

    /**
     * Transfer existing policies.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function transfer(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate(array_merge(PolicyFlow::$validate, [
                'policy.name' => 'required',
                'policy_series_from' => 'required',
                'policy_series_to' => 'required',
                'policy_flow.branch_id' => 'required',
            ]));

            $policies = Policy::where('name', '=', $request['policy']['name'])
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
                $policy_flow = $policy->policy_flows->first();
                $policy_flow->delete();

                $policy_flow_data = $request['policy_flow'];
                $policy_flow_data['policy_id'] = $policy->id;
                $policy_flow_data['status'] = PolicyFlow::STATUS_TRANSFERRED;

                $policy_flow = PolicyFlow::create($policy_flow_data);
                $policy_flow->files()->createMany($files);
            }

            return redirect()->route('policy_flows.index')
                             ->with('success', 'Успешно произведены перемещения существующих полисов');
        }

        return view('policy_flow.transfer', [
            'policy' => new Policy(),
            'policy_flow' => new PolicyFlow(),
        ]);
    }
}
