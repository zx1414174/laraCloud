<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth','namespace'=>'Auth'], function () {
	Route::group(['prefix' => 'register'], function () {
		Route::post('/', 'RegisterController@store');//注册
	});
    Route::group(['prefix' => 'verification_code'], function () {
        Route::post('/', 'VerificationCodeController@store');//发送验证码
    });
    Route::group(['prefix' => 'login'], function () {
        Route::post('/', 'LoginController@login');//发送验证码
    });
});
