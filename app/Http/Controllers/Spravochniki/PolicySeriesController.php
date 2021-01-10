<?php

namespace App\Http\Controllers\Spravochniki;

use App\Http\Controllers\Controller;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;

class PolicySeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policySeries = PolicySeries::latest()->paginate(5);

        return view('spravochniki.policy_series.index',compact('policySeries'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spravochniki.policy_series.create');
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
            'code' => 'required',
        ]);

        PolicySeries::create($request->all());

        return redirect()->route('policy_series.index')
            ->with('success','Успешно добавлена новая серия полиса');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spravochniki\PolicySeries  $policySeries
     * @return \Illuminate\Http\Response
     */
    public function show(PolicySeries $policySeries)
    {
        return view('spravochniki.policy_series.edit',compact('policySeries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spravochniki\PolicySeries  $policySeries
     * @return \Illuminate\Http\Response
     */
    public function edit(PolicySeries $policySeries)
    {
        return view('spravochniki.policy_series.edit',compact('policySeries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spravochniki\PolicySeries  $policySeries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PolicySeries $policySeries)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $policySeries->update($request->all());

        return redirect()->route('policy_series.index')
            ->with('success', sprintf('Дынные о серии \'%s\' были успешно обновлены', $request->input('code')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spravochniki\PolicySeries $policySeries
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(PolicySeries $policySeries)
    {
        $policySeries->delete();

        return redirect()->route('bank.index')
            ->with('success', sprintf('Дынные о серии \'%s\' были успешно удалены', $policySeries->code));
    }
}
