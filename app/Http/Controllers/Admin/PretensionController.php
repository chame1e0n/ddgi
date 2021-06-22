<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Branch;
use App\Model\Policy;
use App\Model\Pretension;
use Illuminate\Http\Request;

class PretensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.index-layout', [
            'objects' => Pretension::all(),
            'title' => 'Претензии',
            'fields' => [
                'branch_id' => [
                    'title' => 'Филиал',
                    'type' => 'select',
                    'list' => Branch::select('id', 'name')->get()->pluck('name', 'id'),
                ],
            ],
            'route' => 'pretension',
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
            'object' => new Pretension(),
            'form_path' => 'admin.pretension.form',
            'branches' => Branch::select('id', 'name')->get()->pluck('name', 'id'),
            'policies' => Policy::select('id', 'series')->get()->pluck('name', 'id'),
            'statuses' => Pretension::$statuses
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
        $this->saveObject(new Pretension());

        return redirect()->route('pretension.index')
            ->with('success', 'Успешно добавлена новая претензия');
    }

    /**
     * Display the specified resource.
     *
     * @param  Pretension $pretensions
     * @return \Illuminate\Http\Response
     */
    public function show(Pretension $pretension)
    {
        return view('admin.pretension.edit', compact('pretension'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Pretension $pretension
     * @return \Illuminate\Http\Response
     */
    public function edit(Pretension $pretension)
    {
        return view('admin.common.edit', [
                'object' => $pretension,
                'form_path' => 'admin.pretension.form',
                'branches' => Branch::select('id', 'name')->get()->pluck('name', 'id'),
                'policies' => Policy::select('id', 'series')->get()->pluck('name', 'id'),
                'statuses' => Pretension::$statuses
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pretension $pretension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pretension $pretension)
    {
        $this->saveObject($pretension);

        return redirect()->route('pretension.index')
            ->with('success', sprintf('Дынные о претензие \'%s\' были успешно обновлены', $pretension->name));
    }

    protected function saveObject($pretension) {
        request()->validate([
            'pretension.branch_id' => 'required',
            //'pretension.policy_id' => 'required',
            'pretension.status' => 'required',
            'pretension.case_number' => 'required',
            'pretension.actually_paid' => 'required',
            'pretension.last_payment_date' => 'required',
        ]);

        $pretension->fill(request('pretension'));
        $pretension->save();
    }

    /**
     * @param Pretension $pretension
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Pretension $pretension)
    {
        $pretension->delete();

        return redirect()->route('pretension.index')
            ->with('success', sprintf('Дынные о претензие \'%s\' были успешно удалены', $pretension->name));
    }
}
