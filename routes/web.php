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

Route::get('test', function () {
    $dog = new Dogovor();
    echo $dog->createUniqueNumber(3, 1);
});

Route::group(['middleware' => ['auth']], function () {
    ///Printing
    Route::get('product3777/print/{id}', 'Product3777\Product3777Controller@print')->name('print');

    /////////////////////////////////////////////////////////////////////////////////

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

    Route::resource('perestrahovaniya', 'PerestrahovaniyaController');
    Route::resource('perestrahovaniya_overview', 'PerestrahovaniyaOverviewController');
    Route::resource('request_overview', 'RequestOverviewController');
    ////Policy_Filter
    Route::resource('policy_filter', 'PolicyFilterController');
    Route::post('policy_filter/filter', 'PolicyFilterController@filter')->name('all_product.filter');

    ////Teztools
    Route::resource('teztools', 'TeztoolsController');
    Route::get('teztools/download/{id}/{info_id}', 'TeztoolsController@download')->name('teztools.download');

    ////Broker
    Route::get('broker/download/{id}/{info_id}', 'BrokerController@download')->name('broker.download');

    // Ajax forms parts
    Route::get('/form-part/ajax', 'AjaxFormController@part')->name('ajax-form.part');

    //////////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    Route::resource('directory/banks', 'Admin\Spravochniki\BankController');
    Route::resource('directory/branches', 'Admin\Spravochniki\BranchController');
    Route::resource('directory/currencies', 'Admin\Spravochniki\CurrencyController');
    Route::resource('directory/regions', 'Admin\Spravochniki\RegionController');
    Route::resource('directory/requests', 'Admin\Spravochniki\RequestController');
    Route::resource('directory/specifications', 'Admin\Spravochniki\SpecificationController');

    Route::resource('directors', 'Admin\DirectorController');
    Route::resource('agents', 'Admin\AgentController');
    Route::resource('managers', 'Admin\ManagerController');

    Route::resource('spravochniki/product','ProductController'); // :TODO:
    Route::resource('spravochniki/policy_series','Spravochniki\PolicySeriesController');
    Route::resource('spravochniki/individual_client','Spravochniki\IndividualClientController');
    Route::resource('spravochniki/legal_client','Spravochniki\LegalClientController');
    Route::resource('spravochniki/klass','KlassController');
    Route::resource('policy_registration','PolicyRegistrationController');

    Route::resource('policy','PolicyController');

    Route::resource('kasko','Product\KaskoController');
    Route::resource('nepogashen','Product\NepogashenController');
    Route::resource('otvetstvennost-broker','Product\OtvetstvennostBrokerController')->names('otvetstvennost-broker');
    Route::resource('policy_flow','PolicyFlowController');
    Route::post('policy_pending_transfer/{id}', 'PolicyTransferController@confirm')->name('policy_transfer.confirm');
    Route::resource('policy_transfer','PolicyTransferController');
    Route::resource('policy_retransfer','PolicyRetransferController');
    Route::resource('pretensii_overview','PretensiiOverviewController');
    Route::get('pretensii_overview/create/{id}', 'PretensiiOverviewController@create');

    Route::get('get/policies', function (Request $request) {
        return \App\Models\Policy::where('policy_series_id', $request->input('policy_series_id'))->get()->toJson();
    })->name('getPolicies');
    Route::get('get/branch_agent_managers', 'EmployeeController@getBranchAgentManagers')->name('getBranchAgentManagers');
    Route::get('get/branch_employees', 'EmployeeController@getBranchEmployees')->name('getBranchEmployees');
    Route::get('get/employees', 'EmployeeController@getEmployees')->name('getEmployees');
    Route::get('get/agents', 'EmployeeController@getAgents')->name('getAgents');
    Route::get('get/polis_name', function () {
        $polis_names = \App\Model\Policy::validPolicies()->select('polis_name')->groupBy('polis_name')->get();

        return $polis_names->toJson();
    })->name('getPolisNames');
    Route::get('get/policy_relations', function (Request $request) {
        $policies = \App\Model\Policy::validPolicies()->where('polis_name', $request->polis_name);

        $connection = \Illuminate\Support\Facades\DB::connection();

        $query = $connection->table('agents');
        $query->select('agents.id', 'agents.name');
        $query->crossJoin('policies', 'policies.user_id', '=', 'agents.user_id');
        $query->whereNotIn('policies.status', ['lost', 'cancelling', 'terminated', 'underwritting']);
        $query->where('policies.polis_name', $request->polis_name);

        return [
            'series' => $policies->pluck('number', 'id'),
            'agents' => $query->pluck('name', 'id'),
        ];
    })->name('getPolicyRelations');
    Route::get('get/banks', function (Request $request) {
        return \App\Models\Spravochniki\Bank::select('id', 'code as mfo', 'name')->get()->toJson();
    })->name('getBanks');

    Route::get('branches', 'Api\BranchController@index')->name('branches');

    Route::get('spravochniki/request/upload/{file}', function ($id) {
        $file = \App\Models\Spravochniki\RequestModel::findOrFail($id);

        $filetype = explode(".", $file->file);

        return \Illuminate\Support\Facades\Storage::disk('public')->download($file->file, $file->from_whom . "." . $filetype[1]);
    })->name('request.upload');

    Route::resource('pretension', 'Admin\PretensionController');
    Route::resource('pretensionoverview', 'Admin\PretensionOverviewController');
    /*Route::group(['middleware' => ['permission:show pretensii']], function () {
        Route::resource('pretension', 'Admin\PretensionController'); // ['only' => ['index']]
        //Route::get('pretension/create/{id}', 'PretensiiController@create'); // ['only' => ['index']]
    });*/

    Route::get('site_order/refresh', 'FromSiteOrderController@refresh')->name('site_order.refresh');
    Route::resource('site_order', 'FromSiteOrderController', [
        'only' => ['index', 'show']
    ]);

    Route::resource('avto/index', 'Product\DobrovolkaAvtoController')->names('avto-index');


    Route::resource('neshchastka_borrower', 'NeshchastkaBorrowerController');
    Route::resource('borrower_sportsman', 'BorrowerSportsmanController');
    Route::resource('neshchastka/time', 'Product\Neshchastka24TimeController')->names('neshchastka-time');
    Route::resource('mejd', 'MejdController');
    Route::resource('covid-fiz','Product\CovidController')->names('covid-fiz');
    Route::resource('zalog/autozalog-mnogostoronniy', 'Product\ZalogAutozalogMnogostoronniyController')->names('zalog-autozalog-mnogostoronniy');
    Route::resource('lizing_ts','Product\LizingTsController');
    Route::resource('kasco', 'Product\KaskoController')->names('kasco-add');
    Route::resource('zalog/autozalog3x', 'Product\AutoZalog3xController')->names('zalog-autozalog3x');
    Route::resource('zalog/tehnika', 'Product\ZalogTehnikaController')->names('zalog-tehnika');
    Route::resource('export', 'ExportController');
    Route::resource('zalog-imushestvo','Product\ZalogImushestvoController')->names('zalog-imushestvo');
    Route::resource('zalog/ipoteka', 'Product\ZalogIpotekaController')->names('zalog-ipoteka');
    Route::resource('imushestvo-lizing-zalog', 'PropertyLisingZalog');
    Route::resource('dobrovolka_imushestvo','Product\DobrovolkaImushestvoController');
    Route::resource('cmp','Product\CmpController');
    Route::resource('zalog/imushestvo3x', 'Product\ZalogImushestvo3xController')->names('zalog-imushestvo3x');
    Route::resource('tamozhnya-add-legal','Product\TamozhnyaAddLegalController')->names('tamozhnya-add-legal');
    Route::resource('tamozhnya-add','Product\TamozhnyaAddController')->names('tamozhnya-add');
    Route::resource('broker', 'BrokerController');
    Route::resource('audit', 'OtvetsvennostAuditController');
    Route::resource('otvetstvennost-realtor','Product\OtvetstvennostRealtorController')->names('otvetstvennost-realtor');
    Route::resource('otvetstvennost/otsenshiki', 'Product\OtvetstvennostOtsenshikiController')->names('otvetstvennost-otsenshiki');
    Route::resource('otvetstvennost-podryadchik','Product\OtvetstvennostPodryadchikController')->names('otvetstvennost-podryadchik');
    Route::resource('otvetstvennost-notaries', 'Product\NotaryController');
    Route::resource('credit-nepogashen','Product\CreditNepogashenController')->names('credit-nepogashen');
    Route::resource('potrebkredit', 'PotrebKreditController');
    Route::resource('avtocredit','Product\AvtocreditController');
    Route::resource('microzaym', 'MicroZaymController');
    Route::resource('rassrochka','Product\CreditRassrochkaController');
    Route::resource('product3777', 'Product3777\Product3777Controller')->except('index');
    Route::resource('garant','Product\GarantController');
});

Auth::routes();

