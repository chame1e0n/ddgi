<?php

use App\Models\Dogovor;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use App\User;

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


Route::get('tamojenniy-sklad/bonded', 'Product\TamojeniySkladController@bonded')->name('bonded.bonded');
Route::get('tamojenniy-sklad/kasko', 'Product\TamojeniySkladController@kasko')->name('bonded.kasko');

Route::get('tc-lizing-zalog/create', function () {
    return view('products.about-tc-lizing-zalog.create');
});
Route::get('imushestvo-lizing-zalog/create', function () {
    return view('products.about-imushestvo-lizing-zalog.create');
});

Route::get('test', function () {
    $dog = new Dogovor();
    echo $dog->createUniqueNumber(3, 1);
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('spravochniki/bank','Spravochniki\BankController');
    Route::resource('spravochniki/group','GroupController');
    Route::resource('spravochniki/klass','KlassController');
    Route::resource('spravochniki/product','ProductController');
    Route::resource('spravochniki/agent','Spravochniki\AgentController');
    Route::resource('spravochniki/manager','Spravochniki\ManagerController');
    Route::resource('spravochniki/policy_series','Spravochniki\PolicySeriesController');
    Route::resource('spravochniki/branch','Spravochniki\BranchController');
    Route::resource('spravochniki/individual_client','Spravochniki\IndividualClientController');
    Route::resource('spravochniki/legal_client','Spravochniki\LegalClientController');
    Route::resource('spravochniki/currency','CurrencyController');
    Route::resource('spravochniki/klass','KlassController');
    Route::resource('director','DirectorController');
    Route::resource('policy_registration','PolicyRegistrationController');
    Route::resource('kasko','Product\KaskoController');
    Route::resource('policy_transfer','PolicyTransferController');
    Route::resource('pretensii_overview','PretensiiOverviewController');
    Route::get('pretensii_overview/create/{id}', 'PretensiiOverviewController@create');
    Route::resource('spravochniki/request', 'Spravochniki\RequestController');
    Route::get('get/policies', 'Spravochniki\RequestController@getPolicyByPolicySeries')->name('getPolicies');

    Route::get('spravochniki/request/upload/{file}', 'Spravochniki\RequestController@upload')->name('request.upload');

    Route::group(['middleware' => ['permission:show pretensii']], function() {
        Route::resource('pretensii','PretensiiController'); // ['only' => ['index']]
        Route::get('pretensii/create/{id}','PretensiiController@create'); // ['only' => ['index']]
    });

    Route::get('site_order/refresh', 'FromSiteOrderController@refresh')->name('site_order.refresh');
    Route::resource('site_order', 'FromSiteOrderController', [
        'only' => ['index', 'show']
    ]);
});

Auth::routes();
