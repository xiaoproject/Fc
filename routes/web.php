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

    // 登录
    Route::get('login', 'LoginController@login');

    // 后台首页
    Route::any('index', 'AdminController@index');
    // 后台欢迎界面
    Route::get('welcome', 'AdminController@welcome');

    Route::resource('user', 'UserController');
});