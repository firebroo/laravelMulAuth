<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => ['web', 'guest:manage'], 'namespace' => 'Manage', 'prefix' => 'manage'], function() {
    Route::get('login', 'AuthController@getLogin');
    Route::post('login', 'AuthController@postLogin');
    Route::get('register', 'AuthController@getRegister');
    Route::post('register', 'AuthController@postRegister');
});

Route::group(['middleware' => ['web'], 'namespace' => 'Manage', 'prefix' => 'manage'], function() {
    Route::get('logout', 'AuthController@getLogout');
});

Route::group(['middleware' => ['web', 'auth:manage'], 'namespace' => 'Manage', 'prefix' => 'manage'], function() {
    Route::get('/', 'HomeController@index');
});



Route::group(['middleware' => 'web'], function () {
    Route::auth();
});

Route::group(['middleware' => ['web', 'auth:web']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
});
