<?php

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

//Admin routes
Route::group([ 'prefix' => env('APP_ADMIN', 'admin') ], function () {

    Route::get('/', 'DashboardController@index');

    Route::get('users', 'UsersController@index');
    Route::get('users/create', 'UsersController@create');
    Route::post('users/create', 'UsersController@store');
    Route::get('user/{id}', 'UsersController@show');
    Route::get('user/edit/{id}', 'UsersController@edit');
    Route::post('user/edit/{id}', 'UsersController@update');
    Route::get('user/delete/{id}', 'UsersController@delete');
});

Route::get('/', function () {
    return view('welcome');
});
