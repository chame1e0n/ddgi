<?php

namespace App\Http\Controllers;

use App\Models\Pretensii;
use App\Models\PretensiiOverview;
use App\User;
use Illuminate\Http\Request;

class PretensiiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pretensiis = Pretensii::latest()->paginate(5);

        return view('pretensii.index',compact('pretensiis'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pretensii.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pretensii::create($request->all());

        return redirect()->route('pretensii.index')
            ->with('success','Успешно добавлена новая притензия');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pretensii  $pretensii
     * @return \Illuminate\Http\Response
     */
    public function show(Pretensii $pretensii)
    {
        return view('pretensii.edit',compact('pretensii'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pretensii  $pretensii
     * @return \Illuminate\Http\Response
     */
    public function edit(Pretensii $pretensii)
    {
        return view('pretensii.edit',compact('pretensii'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pretensii  $pretensii
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pretensii $pretensii)
    {
        $pretensii->update($request->all());

        return redirect()->route('pretensii.index')
            ->with('success', sprintf('Дынные о претензии с номером документа\'%s\' были успешно обновлены', $request->input('case_number')));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pretensii  $pretensii
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pretensii $pretensii)
    {
        $pretensii->delete();

        return redirect()->route('pretensii.index')
            ->with('success', sprintf('Дынные о претензии с номером документа \'%s\' были успешно удалены', $pretensii->case_number));
    }
}
