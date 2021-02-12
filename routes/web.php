<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;

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

Route::get('tamojenniy-sklad/create', function () {
    return view('products.about-tamojenniy-sklad.create');
});
Route::get('tc-lizing-zalog/create', function () {
    return view('products.about-tc-lizing-zalog.create');
});
Route::get('imushestvo-lizing-zalog/create', function () {
    return view('products.about-imushestvo-lizing-zalog.create');
});

Route::get('test', function () {
    $client = new Client();
    $url = Config::get('baseauth.url');

    $response = $client->request(
        'GET', /*instead of GET, you can use POST, PUT, DELETE, etc*/
        $url,
        [
            'auth' => [Config::get('baseauth.username'), Config::get('baseauth.password')] /*if you don't need to use a password, just leave it null*/
        ]
    );

    $decodedJsonData = json_decode($response->getBody());

    foreach ($decodedJsonData as $data) {
        // If no matching model exists with order_id = id from decoded data, create one.
        $fromSiteOrder = App\Models\FromSiteOrder::updateOrCreate(
            ['order_id' => $data->id],
            [
                'title' => $data->title,
                'object_title' => $data->object_title,
                'status' => $data->status,
                'amount' => $data->amount,
                'prize' => $data->prize,
                'timestamp' => date('Y-m-d H:i:s', strtotime($data->timestamp)),
                'term' => date('Y-m-d H:i:s', strtotime($data->term)),
                'inventory_number' => $data->inventory_number,
                'total_area' => $data->total_area,
                'city_property' => $data->city_property,
                'street' => $data->street,
                'type_property' => $data->type_property,
                'matches_registration_address' => $data->matches_registration_address,
                'username' => $data->user->username,
                'first_name' => $data->user->first_name,
                'last_name' => $data->user->last_name,
                'middle_name' => $data->user->middle_name,
                'is_active' => $data->user->is_active,
                'avatar' => $data->user->avatar,
                'birth_day' => $data->user->birth_day,
                'serial_number' => $data->user->serial_number,
                'passport_number' => $data->user->passport_number,
                'date_issue' => $data->user->date_issue,
                'issued_by' => $data->user->issued_by,
                'phone' => $data->user->phone,
                'email_index' => $data->user->email_index,
                'city' => $data->user->city,
                'district' => $data->user->district,
                'user_street' => $data->user->street,
                'apartment_number' => $data->user->apartment_number,
                'home_number' => $data->user->home_number
            ]
        );
    }


});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('spravochniki/bank','Spravochniki\BankController');
    Route::resource('spravochniki/group','GroupController');
    Route::resource('spravochniki/klass','KlassController');
    Route::resource('spravochniki/product','ProductController');
    Route::resource('spravochniki/agent','Spravochniki\AgentController');
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
