<?php

namespace App\Http\Controllers;

use App\Model\Policy;
use App\Model\PolicyFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PolicyController extends Controller
{
    /**
     * Display a list of all policies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->has('filter') ? $request['filter'] : [];

        $filter = array_filter($data, function ($value) { return !is_null($value) && $value !== ''; });

        $policies = Policy::select('policies.*')
            ->crossJoin('employees', 'policies.employee_id', '=', 'employees.id')
            ->where($filter)
            ->get();

        return view('policy.index', compact('policies'));
    }

    /**
     * Show a form to create a new policies.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $policy = new Policy();
        $policy->print_size = Policy::PRINT_SIZE_A4;

        return view('policy.create', [
            'policy' => $policy,
        ]);
    }

    /**
     * Store a new policies.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(array_merge(
            Policy::$validate,
            ['policy_series_from' => 'required', 'policy_series_to' => 'required'],
        ));

        $policy_data = $request['policy'];
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
        if ($request['files']) {
            foreach($request['files'] as $file) {
                $files[] = [
                    'type' => 'document',
                    'original_name' => $file->getClientOriginalName(),
                    'path' => Storage::putFile('public/policy', $file),
                ];
            }
        }

        for ($i = $policy_series_from; $i <= $policy_series_to; $i++) {
            $policy_data['employee_id'] = $employee->id;
            $policy_data['series'] = $i;
            $policy_data['status'] = PolicyFlow::STATUS_REGISTERED;

            $policy = Policy::create($policy_data);

            $policy->files()->createMany($files);
        }

        return redirect()->route('policies.index')
                         ->with('success', 'Успешно добавлены новые полисы');
    }

    /**
     * Display an existing policy.
     *
     * @param  \App\Model\Policy $policy
     * @return \Illuminate\Http\Response
     */
    public function show(Policy $policy)
    {
        return view('policy.form', [
            'block' => true,
            'policy' => $policy,
        ]);
    }

    /**
     * Show a form to edit existing policy.
     *
     * @param  \App\Model\Policy $policy
     * @return \Illuminate\Http\Response
     */
    public function edit(Policy $policy)
    {
        return view('policy.form', [
            'block' => false,
            'policy' => $policy,
        ]);
    }

    /**
     * Update an existing policy.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Policy        $policy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Policy $policy)
    {
        $request->validate(Policy::$validate);

        $policy->fill($request['policy']);
        $policy->save();

        if ($request['files']) {
            $files = [];

            foreach($request['files'] as $file) {
                $files[] = [
                    'type' => 'document',
                    'original_name' => $file->getClientOriginalName(),
                    'path' => Storage::putFile('public/policy', $file),
                ];
            }

            $policy->files()->delete();
            $policy->files()->createMany($files);
        }

        return redirect()->route('policies.index')
                         ->with('success', sprintf('Данные о полисе \'%s\' были успешно обновлены', $policy->name));
    }

    /**
     * Destroy an existing policy.
     * 
     * @param \App\Model\Policy $policy
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Policy $policy)
    {
        $policy->delete();

        return redirect()->route('policies.index')
                         ->with('success', sprintf('Данные о полисе \'%s\' были успешно удалены', $policy->number));
    }
}
