<?php

namespace App\Http\Controllers\Admin\Spravochniki;

use App\Http\Controllers\Controller;
use App\Model\Group;
use App\Model\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.layouts.index-layout', [
            'objects' => $types,
            'title' => 'Классы',
            'fields' => [
                'name' => 'Наименование',
                'code' => 'Код',
                'description' => 'Описание',
                'group_id' => [
                    'title' => 'Группа',
                    'type' => 'select',
                    'list' => Group::select('id', 'name')->get()->keyBy('id')
                ],
            ],
            'route' => 'type'
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
            'object' => new Type(),
            'form_path' => 'admin.spravochniki.type.form',
            'groups' => Group::all()
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
        $this->saveObject(new Type());

        return redirect()->route('type.index')
            ->with('success', 'Успешно добавлен новый класс');
    }

    /**
     * Display the specified resource.
     *
     * @param  Type $types
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.spravochniki.type.edit', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.common.edit', [
                'object' => $type,
                'form_path' => 'admin.spravochniki.type.form',
                'groups' => Group::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $this->saveObject($type);

        return redirect()->route('type.index')
            ->with('success', sprintf('Дынные о классе \'%s\' были успешно обновлены', $type->name));
    }

    protected function saveObject($type) {
        request()->validate([
            'type.code' => 'required',
            'type.name' => 'required',
            'type.description' => 'required',
            'type.group_id' => 'required'
        ]);

        $type->fill(request('type'));
        $type->save();
    }

    /**
     * @param Type $type
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('type.index')
            ->with('success', sprintf('Дынные о классе \'%s\' были успешно удалены', $type->name));
    }
}
