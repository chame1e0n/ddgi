<?php

namespace App\Http\Controllers\Admin\Spravochniki;

use App\Http\Controllers\Controller;
use App\Model\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.index-layout', [
            'objects' => Region::all(),
            'title' => 'Регионы',
            'fields' => [
                'name' => 'Регион',
                'created_at' => 'Создан',
            ],
            'route' => 'region',
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
            'object' => new Region(),
            'form_path' => 'admin.spravochniki.region.form'
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
        $this->saveObject(new Region());

        return redirect()->route('region.index')
            ->with('success', 'Успешно добавлена новая регион');
    }

    /**
     * Display the specified resource.
     *
     * @param  Region $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        return view('admin.spravochniki.region.edit', compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Region $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        return view('admin.common.edit', [
                'object' => $region,
                'form_path' => 'admin.spravochniki.region.form'
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Region $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        $this->saveObject($region);

        return redirect()->route('region.index')
            ->with('success', sprintf('Дынные о группе \'%s\' были успешно обновлены', $region->name));
    }

    protected function saveObject($region) {
        request()->validate([
            'region.name' => 'required',
        ]);

        $region->fill(request('region'));
        $region->save();
    }

    /**
     * @param Region $region
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()->route('region.index')
            ->with('success', sprintf('Дынные о группе \'%s\' были успешно удалены', $region->name));
    }
}
