<?php

namespace App\Http\Controllers\Admin\Spravochniki;

use App\Http\Controllers\Controller;
use App\Model\Request as ModelRequest;
use App\User;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
    /**
     * Display a list of all requests.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.index-layout', [
            'objects' => ModelRequest::all(),
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
                    'list' => ModelRequest::$statuses,
                ],
                'created_at' => 'Дата запроса',
            ],
            'route' => 'requests',
        ]);
    }

    /**
     * Show a form to create a new request.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spravochniki.request.form', [
            'block' => false,
            'request' => new ModelRequest(),
        ]);
    }

    /**
     * Store a new request.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(HttpRequest $http_request)
    {
        $http_request->validate(Request::$validate);

        $model_request = new ModelRequest();
        $model_request->fill($http_request['request']);
        $model_request->save();

        return redirect()->route('requests.index')
                         ->with('success', 'Успешно добавлен новый запрос');
    }

    /**
     * Display an existing request.
     *
     * @param  \App\Model\Request $model_request
     * @return \Illuminate\Http\Response
     */
    public function show(ModelRequest $model_request)
    {
        return view('admin.spravochniki.request.form', [
            'block' => true,
            'request' => $model_request,
        ]);
    }

    /**
     * Show a form to edit existing request.
     *
     * @param  \App\Model\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelRequest $model_request)
    {
        return view('admin.spravochniki.request.form', [
            'block' => false,
            'request' => $model_request,
        ]);
    }

    /**
     * Update an existing request.
     *
     * @param  \Illuminate\Http\Request $http_request
     * @param  \App\Model\Request $model_request
     * @return \Illuminate\Http\Response
     */
    public function update(HttpRequest $http_request, ModelRequest $model_request)
    {
        $http_request->validate(Request::$validate);

        $model_request->fill($http_request['request']);
        $model_request->save();

        return redirect()->route('requests.index')
                         ->with('success', sprintf('Данные о запросе \'%s\' были успешно обновлены', $model_request->name));
    }

    /**
     * Destroy an existing request.
     * 
     * @param \App\Model\Request $model_request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(ModelRequest $model_request)
    {
        $model_request->delete();

        return redirect()->route('requests.index')
                         ->with('success', sprintf('Данные о запросе \'%s\' были успешно удалены', $model_request->name));
    }
}
