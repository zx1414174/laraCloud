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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'auth','namespace'=>'Auth'], function () {
    Route::group(['prefix' => 'register'], function () {
        Route::get('/', 'RegisterController@showRegistrationForm');//获取注册页面
    });
});

Route::group(['prefix' => 'chatroom','namespace'=>'Chatroom'], function () {
    Route::get('/detail', 'ChatroomController@viewDetail');//获取注册页面
});