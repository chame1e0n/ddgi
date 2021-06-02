<?php

namespace App\Http\Controllers\Admin\Spravochniki;

use App\Http\Controllers\Controller;
use App\Model\Group;
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
        $specifications = Specification::all();

        return view('admin.layouts.index-layout', [
            'objects' => $specifications,
            'title' => 'Продукты',
            'fields' => [
                'name' => 'Наименование',
                'code' => 'Код',
                'tarif' => 'Тарифная ставка',
                'type_id' => [
                    'title' => 'Класс',
                    'type' => 'select',
                    'list' => Type::select('id', 'name')->get()->keyBy('id')
                ],
            ],
            'route' => 'specification'
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
            'object' => new Specification(),
            'form_path' => 'admin.spravochniki.specification.form',
            'types' => Type::all()
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
        $this->saveObject(new Specification());

        return redirect()->route('specification.index')
            ->with('success', 'Успешно добавлен новый продукте');
    }

    /**
     * Display the specified resource.
     *
     * @param  Specification $specification
     * @return \Illuminate\Http\Response
     */
    public function show(Specification $specification)
    {
        return view('admin.spravochniki.specification.edit', compact('specification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Specification $specification
     * @return \Illuminate\Http\Response
     */
    public function edit(Specification $specification)
    {
        return view('admin.common.edit', [
                'object' => $specification,
                'form_path' => 'admin.spravochniki.specification.form',
                'types' => Type::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Specification $specification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specification $specification)
    {
        $this->saveObject($specification);

        return redirect()->route('specification.index')
            ->with('success', sprintf('Дынные о продукте \'%s\' были успешно обновлены', $specification->name));
    }

    protected function saveObject($specification) {
        request()->validate([
            'specification.code' => 'required',
            'specification.name' => 'required',
            'specification.tarif' => 'required',
            'specification.type_id' => 'required',
            'specification.max_acceptable_amount' => 'required'
        ]);

        $specification->fill(request('specification'));
        $specification->save();
    }

    /**
     * @param Specification $specification
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Specification $specification)
    {
        $specification->delete();

        return redirect()->route('specification.index')
            ->with('success', sprintf('Дынные о продукте \'%s\' были успешно удалены', $specification->name));
    }
}
