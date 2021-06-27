<?php

namespace App\Http\Controllers\Admin\Spravochniki;

use App\Http\Controllers\Controller;
use App\Model\Branch;
use App\Model\Region;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a list of all branches.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.index-layout', [
            'objects' => Branch::all(),
            'title' => 'Филиалы',
            'fields' => [
                'name' => 'Филиал',
                'created_at' => 'Создан',
                'region_id' => [
                    'title' => 'Регион',
                    'type' => 'select',
                    'list' => Region::select('id', 'name')->get()->pluck('name', 'id'),
                ],
            ],
            'route' => 'branches',
        ]);
    }

    /**
     * Show a form to create a new branch.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spravochniki.branch.form', [
            'block' => false,
            'branch' => new Branch(),
        ]);
    }

    /**
     * Store a new branch.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Branch::$validate);

        $branch = new Branch();
        $branch->fill($request['branch']);
        $branch->save();

        return redirect()->route('branches.index')
                         ->with('success', 'Успешно добавлен новый филиал');
    }

    /**
     * Display an existing branch.
     *
     * @param  \App\Model\Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        return view('admin.spravochniki.branch.form', [
            'block' => true,
            'branch' => $branch,
        ]);
    }

    /**
     * Show a form to edit existing branch.
     *
     * @param  \App\Model\Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return view('admin.spravochniki.branch.form', [
            'block' => false,
            'branch' => $branch,
        ]);
    }

    /**
     * Update an existing branch.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $request->validate(Branch::$validate);

        $branch->fill($request['branch']);
        $branch->save();

        return redirect()->route('branches.index')
                         ->with('success', sprintf('Данные о филиале \'%s\' были успешно обновлены', $branch->name));
    }

    /**
     * Destroy an existing branch.
     * 
     * @param \App\Model\Branch $branch
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('branches.index')
                         ->with('success', sprintf('Данные о филиале \'%s\' были успешно удалены', $branch->name));
    }
}
