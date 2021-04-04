<?php

namespace App\Http\Controllers;

use App\RequestOverview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestOverviewController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'passed' => 'required',
            'comment' => 'required',
        ]);
        $request_overview = RequestOverview::create([
            "user_id" => Auth::id(),
            "request_id" => $request->request_id,
            "passed" => $request->passed,
            "comment" => $request->comment
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'passed' => 'required',
            'comment' => 'required',
        ]);
        $request_overview = RequestOverview::query()->findOrFail($id);
        if ($request_overview->user_id != Auth::id()) {
            return abort(403);
        }
        $request_overview->update([
            "passed" => $request->passed,
            "comment" => $request->comment
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
