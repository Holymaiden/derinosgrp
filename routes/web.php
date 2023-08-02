<?php

use App\Http\Controllers\ProfileController;
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

Route::group(['prefix' => 'dashboard',  'namespace' => 'App\Http\Controllers',  'middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'master', 'namespace' => 'Master'], function () {
        Route::get('/user-management', 'UserController@index')->name('user-management');
        Route::get('/user-list', 'UserController@paginated')->name('user-list');
        Route::post('/user-list', 'UserController@store')->name('user-list.store');
        Route::get('/user-list/{id}', 'UserController@show')->name('user-list.show');
        Route::put('/user-list/{id}', 'UserController@update')->name('user-list.update');
        Route::delete('/user-list/{id}', 'UserController@destroy')->name('user-list.destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
