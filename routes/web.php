<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'dashboard',  'namespace' => 'App\Http\Controllers',  'middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/data', 'DashboardController@data')->name('dashboard.data');

    // Admin
    Route::group(['prefix' => 'master', 'namespace' => 'Master', 'middleware' => ['role:admin']], function () {
        Route::get('/marketing-management', 'MarketingController@index')->name('marketing-management');
        Route::get('/marketing-list', 'MarketingController@paginated')->name('marketing-list');
        Route::post('/marketing-list', 'MarketingController@store')->name('marketing-list.store');
        Route::get('/marketing-list/{id}', 'MarketingController@show')->name('marketing-list.show');
        Route::put('/marketing-list/{id}', 'MarketingController@update')->name('marketing-list.update');
        Route::delete('/marketing-list/{id}', 'MarketingController@destroy')->name('marketing-list.destroy');

        Route::get('/properti-management', 'PropertiController@index')->name('properti-management');
        Route::get('/properti-list', 'PropertiController@paginated')->name('properti-list');
        Route::post('/properti-list', 'PropertiController@store')->name('properti-list.store');
        Route::get('/properti-list/{id}', 'PropertiController@show')->name('properti-list.show');
        Route::put('/properti-list/{id}', 'PropertiController@update')->name('properti-list.update');

        Route::get('/user-management', 'UserController@index')->name('user-management');
        Route::get('/user-list', 'UserController@paginated')->name('user-list');
        Route::post('/user-list', 'UserController@store')->name('user-list.store');
        Route::get('/user-list/{id}', 'UserController@show')->name('user-list.show');
        Route::put('/user-list/{id}', 'UserController@update')->name('user-list.update');
        Route::delete('/user-list/{id}', 'UserController@destroy')->name('user-list.destroy');

        Route::get('/master-rab-management', 'MasterRabController@index')->name('master-rab-management');
        Route::get('/master-rab-list', 'MasterRabController@paginated')->name('master-rab-list');
        Route::post('/master-rab-list', 'MasterRabController@store')->name('master-rab-list.store');
        Route::get('/master-rab-list/{id}', 'MasterRabController@show')->name('master-rab-list.show');
        Route::put('/master-rab-list/{id}', 'MasterRabController@update')->name('master-rab-list.update');
        Route::delete('/master-rab-list/{id}', 'MasterRabController@destroy')->name('master-rab-list.destroy');
    });

    //User
    Route::group(['prefix' => 'master', 'namespace' => 'Master'], function () {
        Route::get('/cavling', 'CavlingController@index')->name('cavling-management');
        Route::get('/cavling-list', 'CavlingController@data')->name('cavling-list');
        Route::get('/cavling-data', 'CavlingController@cavling')->name('cavling-list.data');
        Route::get('/cavling-kode', 'CavlingController@getKode')->name('cavling-list.kode');
        Route::get('/cavling-customer', 'CavlingController@getCustomer')->name('cavling-list.customer');
        Route::get('/cavling-marketing', 'CavlingController@getMarketing')->name('cavling-list.marketing');
        Route::get('/cavling-list/{id}', 'CavlingController@show')->name('cavling-list.show');
        Route::put('/cavling-list', 'CavlingController@update')->name('cavling-list.update');

        Route::get('/customer-management', 'CustomerController@index')->name('customer-management');
        Route::get('/customer-list', 'CustomerController@paginated')->name('customer-list');
        Route::post('/customer-list', 'CustomerController@store')->name('customer-list.store');
        Route::get('/customer-list/{id}', 'CustomerController@show')->name('customer-list.show');
        Route::put('/customer-list/{id}', 'CustomerController@update')->name('customer-list.update');
        Route::delete('/customer-list/{id}', 'CustomerController@destroy')->name('customer-list.destroy');

        Route::get('/perumahan-management', 'PerumahanController@index')->name('perumahan-management');
        Route::get('/perumahan-list', 'PerumahanController@paginated')->name('perumahan-list');
        Route::post('/perumahan-list', 'PerumahanController@store')->name('perumahan-list.store');
        Route::get('/perumahan-list/{id}', 'PerumahanController@show')->name('perumahan-list.show');
        Route::put('/perumahan-list/{id}', 'PerumahanController@update')->name('perumahan-list.update');
        Route::delete('/perumahan-list/{id}', 'PerumahanController@destroy')->name('perumahan-list.destroy');

        Route::get('/progress-pembangunan-management', 'ProgresPembangunanController@index')->name('progress-pembangunan-management');
        Route::get('/progress-pembangunan-management/detail/{id}', 'ProgresPembangunanController@detail')->name('progress-pembangunan-list.detail');
        Route::get('/progress-pembangunan-list', 'ProgresPembangunanController@data')->name('progress-pembangunan-list');
        Route::get('/progress-pembangunan-list/{id}', 'ProgresPembangunanController@show')->name('progress-pembangunan-list.show');

        Route::get('/rab-management', 'RabController@index')->name('rab-management');
        Route::get('/rab-list', 'RabController@paginated')->name('rab-list');

        Route::get('/rab-detail-management/{blok}', 'RabDetailController@index')->name('rab-detail-management');
        Route::get('/rab-detail-list', 'RabDetailController@paginated')->name('rab-detail-list');
        Route::post('/rab-detail-list', 'RabDetailController@store')->name('rab-detail-list.store');
        Route::get('/rab-detail-list/{id}', 'RabDetailController@show')->name('rab-detail-list.show');
        Route::put('/rab-detail-list/{id}', 'RabDetailController@update')->name('rab-detail-list.update');
        Route::delete('/rab-detail-list/{id}', 'RabDetailController@destroy')->name('rab-detail-list.destroy');
        Route::get('/rab-detail-list-export', 'RabDetailController@export')->name('rab-detail-list.export');
    });

    Route::group(['prefix' => 'laporan', 'namespace' => 'Laporan', 'middleware' => ['role:admin|user']], function () {
        Route::get('/perumahan', 'PerumahanController@index')->name('laporan.perumahan-management');
        Route::get('/perumahan-list', 'PerumahanController@paginated')->name('laporan.perumahan-list');
        Route::get('/perumahan-list/customer', 'PerumahanController@customer')->name('laporan.perumahan-list.customer');
        Route::post('/perumahan-list', 'PerumahanController@store')->name('laporan.perumahan-list.store');
        Route::delete('/perumahan-list/{id}', 'PerumahanController@destroy')->name('laporan.perumahan-list.destroy');
        Route::get('/perumahan-list/export', 'PerumahanController@exportEXCEL')->name('laporan.perumahan-list.export');

        Route::get('/marketing', 'MarketingController@index')->name('laporan.marketing-management');
        Route::get('/marketing-list', 'MarketingController@paginated')->name('laporan.marketing-list');
        Route::get('/marketing-list/marketing', 'MarketingController@marketing')->name('laporan.marketing-list.marketing');
        Route::post('/marketing-list', 'MarketingController@store')->name('laporan.marketing-list.store');
        Route::delete('/marketing-list/{id}', 'MarketingController@destroy')->name('laporan.marketing-list.destroy');

        Route::get('/progres-pembangunan', 'ProgressBlockController@index')->name('laporan.progres-blok-management');
        Route::get('/progres-pembangunan-list', 'ProgressBlockController@paginated')->name('laporan.progres-blok-list');
        Route::get('/progres-pembangunan-list/progress', 'ProgressBlockController@progress')->name('laporan.progres-blok-list.progress');
        Route::post('/progres-pembangunan-list', 'ProgressBlockController@store')->name('laporan.progres-blok-list.store');
        Route::delete('/progres-pembangunan-list/{id}', 'ProgressBlockController@destroy')->name('laporan.progres-blok-list.destroy');
        Route::get('/progres-pembangunan-list/export', 'ProgressBlockController@exportEXCEL')->name('laporan.progres-blok-list.export');
    });

    Route::group(['prefix' => 'profile', 'namespace' => 'Profile'], function () {
        Route::get('/', 'ProfileController@index')->name('profile');
        Route::put('/email', 'ProfileController@updateEmail')->name('profile.email');
        Route::put('/password', 'ProfileController@updatePassword')->name('profile.password');
    });
});

require __DIR__ . '/auth.php';
