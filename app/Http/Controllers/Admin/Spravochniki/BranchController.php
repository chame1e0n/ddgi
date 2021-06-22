<?php

namespace App\Http\Controllers\Admin\Spravochniki;

use App\Http\Controllers\Controller;
use App\Model\Branch;
use App\Model\Region;
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
            'route' => 'branch',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spravochniki.branch.form', [
            'object' => new Branch(),
            'regions' => Region::select('id', 'name')->get()->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->saveObject(new Branch());

        return redirect()->route('branch.index')
            ->with('success', 'Успешно добавлен новый филиал');
    }

    /**
     * Display the specified resource.
     *
     * @param  Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        return view('admin.spravochniki.branch.form', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return view('admin.spravochniki.branch.form', [
                'object' => $branch,
                'regions' => Region::select('id', 'name')->get()->pluck('name', 'id'),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $this->saveObject($branch);

        return redirect()->route('branch.index')
            ->with('success', sprintf('Дынные о филиале \'%s\' были успешно обновлены', $branch->name));
    }

    protected function saveObject($branch) {
        request()->validate([
            'branch.name' => 'required',
            'branch.region_id' => 'required',
            'branch.founded_date' => 'required',
            'branch.address' => 'required',
            'branch.phone_number' => 'required',
        ]);

        $branch->fill(request('branch'));
        $branch->save();
    }

    /**
     * @param Branch $branch
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('branch.index')
            ->with('success', sprintf('Дынные о филиале \'%s\' были успешно удалены', $branch->name));
    }
}
