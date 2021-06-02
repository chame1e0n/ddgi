<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Employee;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = Employee::where('role', 'director')
            ->get();

        return view('admin.layouts.index-layout', [
            'objects' => $directors,
            'title' => 'Директора',
            'fields' => [
                'name' => 'Имя',
            ],
            'route' => 'director'
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
            'object' => new Employee(),
            'form_path' => 'admin.director.form'
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
        $this->saveObject(new Employee());

        return redirect()->route('director.index')
            ->with('success', 'Успешно добавлен новый директор');
    }

    /**
     * Display the specified resource.
     *
     * @param  Employee $directors
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $director)
    {
        return view('admin.director.edit', compact('director'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Employee $director
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $director)
    {
        return view('admin.common.edit', [
                'object' => $director,
                'form_path' => 'admin.director.form'
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Employee $director
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $director)
    {
        $this->saveObject($director);

        return redirect()->route('director.index')
            ->with('success', sprintf('Дынные о директоре \'%s\' были успешно обновлены', $director->name));
    }

    protected function saveObject($director) {
        request()->validate([
            'director.name' => 'required',
        ]);

        $director->fill(request('director'));
        $director->save();
    }

    /**
     * @param Employee $director
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Employee $director)
    {
        $director->delete();

        return redirect()->route('director.index')
            ->with('success', sprintf('Дынные о директоре \'%s\' были успешно удалены', $director->name));
    }
}
