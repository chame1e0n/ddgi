<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('test', function () {
    return view('form/add');
});

Route::resource('spravochniki/bank','Spravochniki\BankController');
Route::resource('spravochniki/agent','Spravochniki\AgentController');
Route::resource('spravochniki/policy_series','Spravochniki\PolicySeriesController');
Route::resource('spravochniki/branch','Spravochniki\BranchController');
Route::resource('director','DirectorController');
Route::resource('policy_registration','PolicyRegistrationController');
