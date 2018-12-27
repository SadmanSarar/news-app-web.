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

Route::post('auth/login', ['as' => 'auth.login', 'uses' => 'Api\\AuthController@postLogin']);

Route::group(['middleware' => ['auth:api'],], function () {
    Route::get('category', 'Api\\CategoryController@index');
    Route::get('news', 'Api\\NewsController@index');
    Route::get('settings', 'Api\\DataController@index');
    Route::get('profile', 'Api\\DataController@profile');
    Route::post('change_password', ['as' => 'change_password', 'uses' => 'Api\\AuthController@postChangePassword']);
});

