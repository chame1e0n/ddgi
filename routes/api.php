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
