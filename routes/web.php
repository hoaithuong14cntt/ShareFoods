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

Route::pattern('name', '(.*)');
Route::group(['namespace' => 'Sharefood', 'as' => 'sharefood.'], function () {
    Route::group(['as' => 'auth.'], function () {
        Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
    });
    Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
    Route::get('contact', ['as' => 'contact', 'uses' => 'HomeController@contact']);
    Route::get('search', ['as' => 'search', 'uses' => 'HomeController@search']);
    Route::get('all', ['as' => 'all', 'uses' => 'AllPlacesController@index']);
    Route::get('{name}/{place}', ['as' => 'show', 'uses' => 'AllPlacesController@show'])->where('place', '[0-9]+');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'ProfileController@index']);
        Route::get('password', ['as' => 'changePassword', 'uses' => 'ProfileController@changePassword']);
        Route::get('save', ['as' => 'save', 'uses' => 'ProfileController@save']);
    });
});
