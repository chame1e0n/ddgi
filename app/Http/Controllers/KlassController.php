<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Klass;
use Illuminate\Http\Request;

class KlassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasses = Klass::all();

        return view('spravochniki.klass.index',compact('klasses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();

        return view('spravochniki.klass.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Klass::create($request->all());

        return redirect()->route('klass.index')
            ->with('success','Успешно добавлена новый класс');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Klass  $klass
     * @return \Illuminate\Http\Response
     */
    public function show(Klass $klass)
    {
        $groups = Group::all();

        return view('spravochniki.klass.edit',compact('klass', 'groups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Klass  $klass
     * @return \Illuminate\Http\Response
     */
    public function edit(Klass $klass)
    {
        $groups = Group::all();

        return view('spravochniki.klass.edit',compact('klass', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Klass  $klass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Klass $klass)
    {
        $klass->update($request->all());

        return redirect()->route('klass.index')
            ->with('success', sprintf('Дынные о классе \'%s\' были успешно обновлены', $request->input('name')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Klass  $klass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Klass $klass)
    {
        $klass->delete();

        return redirect()->route('klass.index')
            ->with('success', sprintf('Дынные о классе \'%s\' были успешно удалены', $klass->name));
    }
}
