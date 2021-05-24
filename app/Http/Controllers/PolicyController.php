<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policies = Policy::filter()->get();

        return view('policy.index', compact('policies'));
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
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function show(Policy $policy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function edit(Policy $policy)
    {
        return view('policy.edit', compact('policy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Policy       $policy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Policy $policy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Policy $policy)
    {
        $policy->delete();

        return redirect()->route('policy.index')
                         ->with('success', sprintf('Данные о полисе \'%s\' были успешно удалены', $policy->number));
    }

    public function getPolisNames(Request $request)
    {
        $polis_names = Policy::validPolicies()->select('polis_name')->groupBy('polis_name')->get();

        return $polis_names->toJson();
    }

    public function getPolicyRelations(Request $request)
    {
        $policies = Policy::validPolicies()->where('polis_name', $request->polis_name);

        $connection = \Illuminate\Support\Facades\DB::connection();

        $query = $connection->table('agents');
        $query->select('agents.id', 'agents.name');
        $query->crossJoin('policies', 'policies.user_id', '=', 'agents.user_id');
        $query->whereNotIn('policies.status', ['lost', 'cancelling', 'terminated', 'underwritting']);
        $query->where('policies.polis_name', $request->polis_name);

        return [
            'series' => $policies->pluck('number', 'id'),
            'agents' => $query->pluck('name', 'id'),
        ];
    }
}
