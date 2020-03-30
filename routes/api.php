<?php

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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::post('send-verification-code', 'API\PhoneNumberVerification@sendCode');
Route::post('verify-phone-number', 'API\PhoneNumberVerification@verify');

Route::group(
    [
        'middleware' => 'auth:api',
    ],
    function () {
        Route::get('logout', 'API\UserController@logout');
        Route::get('user', 'API\UserController@getdetail');
    }
);
