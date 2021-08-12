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

Route::post('construction_participant/for/table', function(Request $request) {
    $view = view('includes.construction_participant_in_table', [
        'key' => $request['key'],
        'construction_participant' => new \App\Model\ConstructionParticipant(),
        'errors' => new \Illuminate\Support\ViewErrorBag(),
    ])->toHtml();

    return [
        'code' => 200,
        'template' => $view,
    ];
})->name('get_construction_participant_for_table');

Route::post('notary_employee/for/table', function(Request $request) {
    $view = view('includes.notary_employee_in_table', [
        'key' => $request['key'],
        'notary_employee' => new \App\Model\NotaryEmployee(),
        'errors' => new \Illuminate\Support\ViewErrorBag(),
    ])->toHtml();

    return [
        'code' => 200,
        'template' => $view,
    ];
})->name('get_notary_employee_for_table');

Route::post('policy/for/table', function(Request $request) {
    $model = '\\App\\Model\\' . $request['model'];

    $view = view('includes.policy_in_table', [
        'key' => $request['key'],
        'policy' => new \App\Model\Policy(),
        'errors' => new \Illuminate\Support\ViewErrorBag(),
        'policy_model' => new $model(),
    ])->toHtml();

    return [
        'code' => 200,
        'template' => $view,
    ];
})->name('get_policy_for_table');

Route::post('property/for/table', function(Request $request) {
    $view = view('includes.property_in_table', [
        'key' => $request['key'],
        'property' => new \App\Model\Property(),
        'errors' => new \Illuminate\Support\ViewErrorBag(),
    ])->toHtml();

    return [
        'code' => 200,
        'template' => $view,
    ];
})->name('get_property_for_table');

Route::post('tranche/for/table', function(Request $request) {
    $view = view('includes.tranche_in_table', [
        'key' => $request['key'],
        'tranche' => new \App\Model\Tranche(),
        'errors' => new \Illuminate\Support\ViewErrorBag(),
    ])->toHtml();

    return [
        'code' => 200,
        'template' => $view,
    ];
})->name('get_tranche_for_table');

Route::get('specifications/of/type', function(Request $request) {
    $specifications = \App\Model\Specification::getSpecificationsByType($request['type']);
    $specifications->map(function($specification) {
        $specification->route = \App\Model\Specification::$specification_key_to_routes[$specification->key];
    });

    return $specifications;
})->name('get_type_specifications');

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