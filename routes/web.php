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
});

Route::get('/', function () {
    return view('tes');
});

Route::group(['prefix' => 'dashboard',  'namespace' => 'App\Http\Controllers',  'middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'master', 'namespace' => 'Master'], function () {
        Route::get('/user-management', 'UserController@index')->name('user-management');
        Route::get('/user-list', 'UserController@paginated')->name('user-list');
        Route::post('/user-list', 'UserController@store')->name('user-list.store');
        Route::get('/user-list/{id}', 'UserController@show')->name('user-list.show');
        Route::put('/user-list/{id}', 'UserController@update')->name('user-list.update');
        Route::delete('/user-list/{id}', 'UserController@destroy')->name('user-list.destroy');

        Route::get('/customer-management', 'CustomerController@index')->name('customer-management');
        Route::get('/customer-list', 'CustomerController@paginated')->name('customer-list');
        Route::post('/customer-list', 'CustomerController@store')->name('customer-list.store');
        Route::get('/customer-list/{id}', 'CustomerController@show')->name('customer-list.show');
        Route::put('/customer-list/{id}', 'CustomerController@update')->name('customer-list.update');
        Route::delete('/customer-list/{id}', 'CustomerController@destroy')->name('customer-list.destroy');

        Route::get('/cavling', 'CavlingController@index')->name('cavling-management');
        // Route::get('/user-list', 'UserController@paginated')->name('user-list');
        // Route::post('/user-list', 'UserController@store')->name('user-list.store');
        // Route::get('/user-list/{id}', 'UserController@show')->name('user-list.show');
        // Route::put('/user-list/{id}', 'UserController@update')->name('user-list.update');
        // Route::delete('/user-list/{id}', 'UserController@destroy')->name('user-list.destroy');
    });

    Route::group(['prefix' => 'profile', 'namespace' => 'Profile'], function () {
        Route::get('/', 'ProfileController@index')->name('profile');
        Route::put('/email', 'ProfileController@updateEmail')->name('profile.email');
        Route::put('/password', 'ProfileController@updatePassword')->name('profile.password');
    });
});

require __DIR__ . '/auth.php';
