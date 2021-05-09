<?php

use App\Models\Dogovor;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Http\Request;

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


//Route::get('tamojenniy-sklad/create', 'Product\TamojeniySkladController@create')->name('bonded.bonded');
//Route::post('tamojenniy-sklad/bonded/store', 'Product\TamojeniySkladController@create')->name('bonded.bonded');

Route::resource('tamojenniy-sklad', 'Product\TamojeniySkladController');
Route::patch('tamojenniy-sklad/store', 'Product\TamojeniySkladController@create')->name('bonded.bonded');
Route::resource('/otvetstvennost-notaries', 'Product\NotaryController');


//Route::get('tamojenniy-sklad/kasko', 'Product\TamojeniySkladController@kasko')->name('bonded.kasko');

//Route::get('tc-lizing-zalog/create', function () {
//    return view('products.about-tc-lizing-zalog.create');
//});

Route::resource('tc-lizing-zalog', 'LisingZalogController');

Route::resource('imushestvo-lizing-zalog', 'PropertyLisingZalog');

Route::get('test', function () {
    $dog = new Dogovor();
    echo $dog->createUniqueNumber(3, 1);
});

Route::get('test1', 'EmployeeController@getEmployees');

Route::group(['middleware' => ['auth']], function () {
    ////////////////////////////////// Ulugbek //////////////////////////////////////
    //// Product3777
    Route::resource('product3777', 'Product3777\Product3777Controller')->except('index');

    //// BorrowerSportsman
    Route::resource('borrower_sportsman', 'BorrowerSportsmanController');

    ///Printing
    Route::get('product3777/print/{id}', 'Product3777\Product3777Controller@print')->name('print');

    ///Audit
    Route::resource('audit', 'OtvetsvennostAuditController');

    ///Cargo
    Route::resource('cargo', 'CargoController');

    ///Mejd
    Route::resource('mejd', 'MejdController');

    /////////////////////////////////////////////////////////////////////////////////

    Route::resource('all_products', 'AllProductController');
    Route::get('/cbu_currencies', function (Request $request) {
        $jsonurl = 'https://cbu.uz/ru/arkhiv-kursov-valyut/json';
        $json = file_get_contents($jsonurl);
        return response()->json(json_decode($json));
    })->name('currencies');

    //////////////////////////////////// Ulugbek \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    /// Search
    Route::get('/product-search', 'AllProductController@search')->name('product.search');
    Route::get('/export-database', 'ZaemshikController@download_db')->name('db_download');
    ////Neshchastka Zaemshik
    Route::resource('borrower', 'NeshchastkZaemshikController');
    Route::resource('perestrahovaniya', 'PerestrahovaniyaController');
    Route::resource('perestrahovaniya_overview', 'PerestrahovaniyaOverviewController');
    Route::resource('neshchastka_borrower', 'NeshchastkaBorrowerController');
    Route::resource('request_overview', 'RequestOverviewController');
    ////Microzaym
    Route::resource('microzaym', 'MicroZaymController');
    ////Potrebkredit
    Route::resource('potrebkredit', 'PotrebKreditController');
    ////Policy_Filter
    Route::resource('policy_filter', 'PolicyFilterController');
    Route::post('policy_filter/filter', 'PolicyFilterController@filter')->name('all_product.filter');

    ////Gruz Export
    Route::resource('export', 'ExportController');

    ////Teztools
    Route::resource('teztools', 'TeztoolsController');

    ////Broker
    Route::resource('broker', 'BrokerController');


    //////////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

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
    Route::resource('policy','PolicyController');
    Route::resource('kasko','Product\KaskoController');
    Route::resource('cmp','Product\CmpController');
    Route::resource('avtocredit','Product\AvtocreditController');
    Route::resource('grant','Product\GrantController');
    Route::resource('nepogashen','Product\NepogashenController');
    Route::resource('credit-nepogashen','Product\CreditNepogashenController')->names('credit-nepogashen');
    Route::resource('otvetstvennost-podryadchik','Product\OtvetstvennostPodryadchikController')->names('otvetstvennost-podryadchik');
    Route::resource('otvetstvennost-broker','Product\OtvetstvennostBrokerController')->names('otvetstvennost-broker');
    Route::resource('otvetstvennost-realtor','Product\OtvetstvennostRealtorController')->names('otvetstvennost-realtor');
    Route::resource('tamozhnya-add-legal','Product\TamozhnyaAddLegalController')->names('tamozhnya-add-legal');
    Route::resource('tamozhnya-add','Product\TamozhnyaAddController')->names('tamozhnya-add');
    Route::resource('rassrochka','Product\RassrochkaController');
    Route::resource('policy_flow','PolicyFlowController');
    Route::post('policy_pending_transfer/{id}', 'PolicyTransferController@confirm')->name('policy_transfer.confirm');
    Route::resource('policy_transfer','PolicyTransferController');
    Route::resource('policy_retransfer','PolicyRetransferController');
    Route::resource('pretensii_overview','PretensiiOverviewController');
    Route::get('pretensii_overview/create/{id}', 'PretensiiOverviewController@create');
    Route::resource('spravochniki/request', 'Spravochniki\RequestController');
    Route::get('get/policies', 'Spravochniki\RequestController@getPolicyByPolicySeries')->name('getPolicies');
    Route::get('get/branch_agent_managers', 'EmployeeController@getBranchAgentManagers')->name('getBranchAgentManagers');
    Route::get('get/branch_employees', 'EmployeeController@getBranchEmployees')->name('getBranchEmployees');
    Route::get('get/employees', 'EmployeeController@getEmployees')->name('getEmployees');
    Route::get('get/agents', 'EmployeeController@getAgents')->name('getAgents');
    Route::get('get/polis_name', 'PolicyController@getPolisNames')->name('getPolisNames');
    Route::get('get/polis_series_by_polis_name', 'PolicyController@getPolicySeries')->name('getPolicySeries');
    Route::get('get/banks', 'Spravochniki\BankController@getAllBanks')->name('getBanks');
    Route::get('branches', 'Api\BranchController@index')->name('branches');

    Route::get('spravochniki/request/upload/{file}', 'Spravochniki\RequestController@upload')->name('request.upload');

    Route::group(['middleware' => ['permission:show pretensii']], function () {
        Route::resource('pretensii', 'PretensiiController'); // ['only' => ['index']]
        Route::get('pretensii/create/{id}', 'PretensiiController@create'); // ['only' => ['index']]
    });

    Route::get('site_order/refresh', 'FromSiteOrderController@refresh')->name('site_order.refresh');
    Route::resource('site_order', 'FromSiteOrderController', [
        'only' => ['index', 'show']
    ]);

    Route::resource('credit-fin-risk/nepogashen-avtocredit', 'Product\CrediFinRiskNepogashenAvtocreditController')->names('nepogashen-avtocredit');
    Route::resource('credit-fin-risk/nepogashen-credit', 'Product\CreditFinRiskNepogashenCreditController')->names('nepogashen-credit');
    Route::resource('avto/index', 'Product\DobrovolkaAvtoController')->names('avto-index');
    Route::resource('otvetstvennost/otsenshiki', 'Product\OtvetstvennostOtsenshikiController')->names('otvetstvennost-otsenshiki');
    Route::resource('kasco', 'Product\KaskoController')->names('kasco-add');
});

Auth::routes();

