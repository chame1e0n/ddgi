<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Branch;
use App\Model\Policy;
use App\Model\Pretension;
use App\Model\PretensionOverview;
use App\User;
use Illuminate\Http\Request;

class PretensionOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.index-layout', [
            'objects' => PretensionOverview::all(),
            'title' => 'Рассмотрение претензии',
            'fields' => [
                'pretension_id' => [
                    'title' => 'Претензия',
                    'type' => 'select',
                    'list' => Pretension::select('id', 'case_number AS name')->get()->pluck('name', 'id'),
                ],
                'employee_id' => [
                    'title' => 'Сотрудник',
                    'type' => 'select',
                    'list' => User::select('id', 'name')->get()->pluck('name', 'id'),
                ],
                'is_passed' => [
                    'title' => 'Принят',
                    'type' => 'checkbox',
                ],
            ],
            'route' => 'pretensionoverview',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.common.create', [
            'object' => new PretensionOverview(),
            'form_path' => 'admin.pretension-overview.form',
            'pretensions' => Pretension::select('id', 'case_number AS name')->get()->pluck('name', 'id'),
            'employees' => User::select('id', 'name')->get()->pluck('name', 'id')
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
        $this->saveObject(new PretensionOverview());

        return redirect()->route('pretension-overview.index')
            ->with('success', 'Успешно добавлена новая претензия');
    }

    /**
     * Display the specified resource.
     *
     * @param  PretensionOverview $pretensionOverview
     * @return \Illuminate\Http\Response
     */
    public function show(PretensionOverview $pretensionOverview)
    {
        return view('admin.pretension-overview.edit', compact('pretensionoverview'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PretensionOverview $pretensionOverview
     * @return \Illuminate\Http\Response
     */
    public function edit(PretensionOverview $pretensionOverview)
    {
        return view('admin.common.edit', [
                'object' => $pretensionOverview,
                'form_path' => 'admin.pretension-overview.form',
                'pretensions' => Pretension::select('id', 'case_number AS name')->get()->pluck('name', 'id'),
                'employees' => User::select('id', 'name')->get()->pluck('name', 'id')
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PretensionOverview $pretension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PretensionOverview $pretension)
    {
        $this->saveObject($pretension);

        return redirect()->route('pretensionoverview.index')
            ->with('success', sprintf('Дынные о претензие \'%s\' были успешно обновлены', $pretension->name));
    }

    protected function saveObject($pretension) {
        request()->validate([
            'pretensionoverview.pretension_id' => 'required',
            'pretensionoverview.employee_id' => 'required',
            'pretensionoverview.is_passed' => 'required',
        ]);

        $pretension->fill(request('pretensionoverview'));
        $pretension->save();
    }

    /**
     * @param PretensionOverview $pretension
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(PretensionOverview $pretension)
    {
        $pretension->delete();

        return redirect()->route('pretensionoverview.index')
            ->with('success', sprintf('Дынные о претензие \'%s\' были успешно удалены', $pretension->name));
    }
}
