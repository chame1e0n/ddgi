<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'Api\LoginController@login');

Route::middleware('auth:api')->group( function () {
    //get data about registered user
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('logout', 'Api\LoginController@logout');

    Route::resource('branch', 'Api\BranchController', [
        'only' => ['index', 'show']
    ]);

    Route::post('agent', 'Api\AgentController@index');
    Route::get('agent/{id}', 'Api\AgentController@show');
});

Route::get('agent_list', function () {
    $list = \App\Models\Spravochniki\Agent::query()->get();
    return response()->json([
        'data' => $list
    ]);
});

Route::post('policy/for/table', function(Request $request) {
    $view = view('includes.policy_in_table', [
        'key' => $request['key'],
        'policy' => new \App\Model\Policy(),
        'errors' => new \Illuminate\Support\ViewErrorBag(),
        'policy_sportsman' => new \App\Model\PolicySportsman(),
    ])->toHtml();

    return [
        'code' => 200,
        'template' => $view,
    ];
})->name('get_policy_for_table');

Route::get('employee/of/policy', function(Request $request) {
    $policy = \App\Model\Policy::where('policies.name', '=', $request['name'])
        ->where('policies.series', '=', $request['series'])
        ->get()
        ->first();
    $policy_flow = $policy->policy_flows->first();

    return $policy_flow ? $policy_flow->to_employee : [];
})->name('get_policy_employee');

Route::get('policies', function (Request $request) {
    return \App\Model\Policy::where('name', $request['name'])
        ->get()
        ->toJson();
})->name('get_policies');