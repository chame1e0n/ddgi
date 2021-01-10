<?php

namespace App\Http\Controllers\Spravochniki;

use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Models\Spravochniki\Branch;
use App\User;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::latest()->paginate(5);

        return view('spravochniki.branch.index',compact('branches'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $directors = Director::all();
        $branches = Branch::all();

        return view('spravochniki.branch.create', compact('directors', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Branch::create($request->all());

        return redirect()->route('branch.index')
            ->with('success','Успешно добавлен новый офис');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spravochniki\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        $directors = Director::all()->except($branch->director->id);
        $branches = Branch::all()->except($branch->id);

        return view('spravochniki.branch.edit',compact('branch','directors', 'branches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spravochniki\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $directors = Director::all()->except($branch->director->id);
        $branches = Branch::all()->except($branch->id);

        return view('spravochniki.branch.edit',compact('branch','directors', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spravochniki\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $branch->update($request->all());

        return redirect()->route('branch.index')
            ->with('success', sprintf('Дынные об офисе \'%s\' были успешно обновлены', $request->input('name')));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spravochniki\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
