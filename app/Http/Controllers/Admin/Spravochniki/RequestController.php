<?php

namespace App\Http\Controllers\Admin\Spravochniki;

use App\Http\Controllers\Controller;
use App\Model\Policy;
use App\Model\Request;
use App\Models\Spravochniki\RequestModel;
use App\User;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.index-layout', [
            'objects' => Request::all(),
            'title' => 'Запросы',
            'fields' => [
                'employee_id' => [
                    'title' => 'От кого',
                    'type' => 'select',
                    'list' => User::select('id', 'name')->get()->pluck('name', 'id'),
                ],
                'status' => [
                    'title' => 'Статус',
                    'type' => 'select',
                    'list' => Request::$statuses,
                ],
                'created_at' => 'Дата запроса',
            ],
            'route' => 'request',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spravochniki.request.form', [
            'object' => new \App\Model\Request(),
            'statuses' => RequestModel::STATUS,
            'policies' => Policy::select('id', 'name')->get()->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->saveObject(new \App\Model\Request());

        return redirect()->route('request.index')
            ->with('success', 'Успешно добавлен новый запрос');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Request $requests
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Model\Request $request)
    {
        return view('admin.spravochniki.request.form', compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Model\Request $request)
    {
        return view('admin.spravochniki.request.form', [
                'object' => $request,
                'statuses' => RequestModel::STATUS,
                'policies' => Policy::select('id', 'name')->get()->pluck('name', 'id'),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Model\Request $request)
    {
        $this->saveObject($request);

        return redirect()->route('request.index')
            ->with('success', sprintf('Дынные о запросе \'%s\' были успешно обновлены', $request->name));
    }

    protected function saveObject($request) {
        request()->validate([
            'request.policy_id' => 'required',
            'request.employee_id' => 'required',
            'request.status' => 'required',
            'request.comment' => 'required',
            'request.file' => 'required',
            'request.act_number' => 'required',
            'request.limit_reason' => 'required',
            'request.policy_amount' => 'required',
        ]);

        $request->fill(request('request'));
        $request->save();
    }

    /**
     * @param \App\Model\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(\App\Model\Request $request)
    {
        $request->delete();

        return redirect()->route('request.index')
            ->with('success', sprintf('Дынные о запросе \'%s\' были успешно удалены', $request->name));
    }
}
