<?php

namespace App\Http\Controllers\Admin\Spravochniki;

use App\Http\Controllers\Controller;
use App\Model\Request as ModelRequest;
use App\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $http_request->validate(['file' => 'required']);

        $http_request_data = $http_request['request'];
        $http_request_data['employee_id'] = Auth::user()->employees->first()->id;

        $model_request = new ModelRequest();
        $model_request->fill($http_request_data);
        $model_request->save();

        $file = [
            'type' => 'document',
            'original_name' => $http_request['file']->getClientOriginalName(),
            'path' => Storage::putFile('public/requests', $http_request['file']),
        ];

        $model_request->file()->create($file);

        return redirect()->route('requests.index')
                         ->with('success', 'Успешно добавлен новый запрос');
    }

    /**
     * Display an existing request.
     *
     * @param  \App\Model\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(ModelRequest $request)
    {
        return view('admin.spravochniki.request.form', [
            'block' => true,
            'request' => $request,
        ]);
    }

    /**
     * Show a form to edit existing request.
     *
     * @param  \App\Model\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelRequest $request)
    {
        return view('admin.spravochniki.request.form', [
            'block' => false,
            'request' => $request,
        ]);
    }

    /**
     * Update an existing request.
     *
     * @param  \Illuminate\Http\Request $http_request
     * @param  \App\Model\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(HttpRequest $http_request, ModelRequest $request)
    {
        $http_request->validate(['file' => 'required']);

        $request->fill($http_request['request']);
        $request->save();

        $file = [
            'type' => 'document',
            'original_name' => $http_request['file']->getClientOriginalName(),
            'path' => Storage::putFile('public/requests', $http_request['file']),
        ];

        $request->file->delete();
        $request->file()->create($file);

        return redirect()->route('requests.index')
                         ->with('success', sprintf('Данные о запросе \'%s\' были успешно обновлены', $request->id));
    }

    /**
     * Destroy an existing request.
     * 
     * @param \App\Model\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(ModelRequest $request)
    {
        $request->delete();

        return redirect()->route('requests.index')
                         ->with('success', sprintf('Данные о запросе \'%s\' были успешно удалены', $request->id));
    }
}
