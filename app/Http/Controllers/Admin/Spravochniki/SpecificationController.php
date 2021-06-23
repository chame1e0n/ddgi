<?php

namespace App\Http\Controllers\Admin\Spravochniki;

use App\Http\Controllers\Controller;
use App\Model\Type;
use App\Model\Specification;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.index-layout', [
            'objects' => Specification::all(),
            'title' => 'Продукты',
            'fields' => [
                'name' => 'Наименование',
                'code' => 'Код',
                'tarif' => 'Тарифная ставка',
                'type_id' => [
                    'title' => 'Класс',
                    'type' => 'select',
                    'list' => Type::select('id', 'name')->get()->pluck('name', 'id'),
                ],
            ],
            'route' => 'specifications',
        ]);
    }

    /**
     * Show a form to create a new specification.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spravochniki.specification.form', [
            'block' => false,
            'specification' => new Specification(),
        ]);
    }

    /**
     * Store a new specification.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Specification::$validate);

        $specification = new Specification();
        $specification->fill($request['specification']);
        $specification->save();

        return redirect()->route('specifications.index')
                         ->with('success', 'Успешно добавлен новый продукт');
    }

    /**
     * Display an existing specification.
     *
     * @param  \App\Model\Specification $specification
     * @return \Illuminate\Http\Response
     */
    public function show(Specification $specification)
    {
        return view('admin.spravochniki.specification.form', [
            'block' => true,
            'specification' => $specification,
        ]);
    }

    /**
     * Show a form to edit existing specification.
     *
     * @param  \App\Model\Specification $specification
     * @return \Illuminate\Http\Response
     */
    public function edit(Specification $specification)
    {
        return view('admin.spravochniki.specification.form', [
            'block' => false,
            'specification' => $specification,
        ]);
    }

    /**
     * Update an existing specification.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Specification $specification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specification $specification)
    {
        $request->validate(Specification::$validate);

        $specification->fill($request['specification']);
        $specification->save();

        return redirect()->route('specifications.index')
                         ->with('success', sprintf('Данные о продукте \'%s\' были успешно обновлены', $specification->name));
    }

    /**
     * Destroy an existing specification.
     * 
     * @param \App\Model\Specification $specification
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Specification $specification)
    {
        $specification->delete();

        return redirect()->route('specifications.index')
                         ->with('success', sprintf('Данные о продукте \'%s\' были успешно удалены', $specification->name));
    }
}
