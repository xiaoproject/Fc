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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('test', 'TestController@test');
    Route::get('login', 'LoginController@login');

    Route::any('index', 'AdminController@index');
    Route::get('welcome', 'AdminController@welcome');
});