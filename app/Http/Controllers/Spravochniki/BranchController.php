<?php

namespace App\Http\Controllers\Spravochniki;

use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Models\Region;
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
        $branches = Branch::all();

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
        $alreadyExistDirectorsUserId = Branch::select('user_id')->distinct()->get()->pluck('user_id')->toArray();
        $regions = Region::all();
        $directors = Director::whereNotIn('user_id', $alreadyExistDirectorsUserId)->get();
        $branches = Branch::all();

        return view('spravochniki.branch.create', compact('directors', 'branches', 'regions'));
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
            'name' => 'required',
            'series' => 'required',
            'founded_at' => 'required',
            'is_center' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'code_by_office' => 'required',
            'code_by_type' => 'required',
            'hierarchy' => 'required',
        ]);
        $request->merge([
            'is_center' => isset($request->is_center) ? 1 : 0,
        ]);
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
        $agents = $branch->agents()->paginate(5);
        $managers = $branch->managers()->paginate(5);

        return view('spravochniki.branch.show',compact('branch','agents', 'managers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spravochniki\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $alreadyExistDirectorsUserId = Branch::select('user_id')->where('user_id', '<>', $branch->user_id)->distinct()->get()->pluck('user_id')->toArray();
        $regions = Region::all();
        $directors = Director::whereNotIn('user_id', $alreadyExistDirectorsUserId)->get();
        $branches = Branch::all();

        return view('spravochniki.branch.edit',compact('branch','directors', 'branches', 'regions'));
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
        $request->merge([
            'is_center' => isset($request->is_center) ? 1 : 0,
        ]);
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
        $branch->delete();

        return redirect()->route('branch.index')
            ->with('success', sprintf('Дынные об офисе \'%s\' были успешно удалены', $branch->name));
    }
}
