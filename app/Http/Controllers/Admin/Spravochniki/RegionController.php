<?php

namespace App\Http\Controllers\Admin\Spravochniki;

use App\Http\Controllers\Controller;
use App\Model\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a list of all regions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.index-layout', [
            'objects' => Region::all(),
            'title' => 'Регионы',
            'fields' => [
                'code' => 'Код',
                'name' => 'Регион',
                'created_at' => 'Создан',
            ],
            'route' => 'regions',
        ]);
    }

    /**
     * Show a form to create a new region.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spravochniki.region.form', [
            'block' => false,
            'region' => new Region(),
        ]);
    }

    /**
     * Store a new region.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Region::$validate);

        $region = new Region();
        $region->fill($request['region']);
        $region->save();

        return redirect()->route('regions.index')
                         ->with('success', 'Успешно добавлен новый регион');
    }

    /**
     * Display an existing region.
     *
     * @param  \App\Model\Region $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        return view('admin.spravochniki.region.form', [
            'block' => true,
            'region' => $region,
        ]);
    }

    /**
     * Show a form to edit existing region.
     *
     * @param  \App\Model\Region $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        return view('admin.spravochniki.region.form', [
            'block' => false,
            'region' => $region,
        ]);
    }

    /**
     * Update an existing region.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Region $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        $request->validate(Region::$validate);

        $region->fill($request['region']);
        $region->save();

        return redirect()->route('regions.index')
                         ->with('success', sprintf('Данные о группе \'%s\' были успешно обновлены', $region->name));
    }

    /**
     * Destroy an existing region.
     * 
     * @param \App\Model\Region $region
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()->route('regions.index')
                         ->with('success', sprintf('Данные о группе \'%s\' были успешно удалены', $region->name));
    }
}
