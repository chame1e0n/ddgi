<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();

        return view('admin.layouts.index-layout', [
            'objects' => $groups,
            'title' => 'Группы',
            'fields' => [
                'name' => 'Группа',
                'created_at' => 'Создан',
                'updated_at' => 'Обновлён'
            ],
            'route' => 'group'
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
            'object' => new Group(),
            'form_path' => 'admin.group.form'
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
        $this->saveObject(new Group(request('group')));

        return redirect()->route('group.index')
            ->with('success', 'Успешно добавлена новая группа');
    }

    /**
     * Display the specified resource.
     *
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('admin.group.edit', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('admin.common.edit', [
                'object' => $group,
                'form_path' => 'admin.group.form'
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $group->update(request('group'));
        $this->saveObject($group);

        return redirect()->route('group.index')
            ->with('success', sprintf('Дынные о группе \'%s\' были успешно обновлены', $group->name));
    }

    protected function saveObject($group) {
        request()->validate([
            'group.name' => 'required',
        ]);

        $group->save();
    }

    /**
     * @param Group $group
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('group.index')
            ->with('success', sprintf('Дынные о группе \'%s\' были успешно удалены', $group->name));
    }
}
