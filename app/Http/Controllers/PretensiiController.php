<?php

namespace App\Http\Controllers;

use App\Models\Pretensii;
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
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pretensii  $pretensii
     * @return \Illuminate\Http\Response
     */
    public function show(Pretensii $pretensii)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pretensii  $pretensii
     * @return \Illuminate\Http\Response
     */
    public function edit(Pretensii $pretensii)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pretensii  $pretensii
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pretensii $pretensii)
    {
        //
    }
}
