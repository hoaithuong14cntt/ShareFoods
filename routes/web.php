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
        Route::post('register', ['as' => 'signup', 'uses' => 'AuthController@register']);
        Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
    });
    Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
    Route::get('contact', ['as' => 'contact', 'uses' => 'HomeController@contact']);
    Route::post('contact', ['as' => 'send_contact', 'uses' => 'HomeController@sendContact']);
    Route::get('search', ['as' => 'searchAll', 'uses' => 'HomeController@search']);
    Route::post('smartSearch', ['as' => 'smartSearch', 'uses' => 'HomeController@smartSearch']);
    Route::get('all', ['as' => 'all', 'uses' => 'AllPlacesController@index']);
    Route::get('place/{place}', ['as' => 'show', 'uses' => 'AllPlacesController@show'])->where('place', '[0-9]+');
    Route::post('comment', ['as' => 'comment', 'uses' => 'AllPlacesController@comment']);
    Route::post('search', ['as' => 'search', 'uses' => 'AllPlacesController@search']);

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('{user}', ['as' => 'index', 'uses' => 'ProfileController@index'])->where('user', '[0-9]+');
        Route::post('{user}', ['as' => 'update', 'uses' => 'ProfileController@update'])->where('user', '[0-9]+');
        Route::get('change-password/{user}', ['as' => 'changePassword', 'uses' => 'ProfileController@changePassword']);
        Route::get('save/{user}', ['as' => 'save', 'uses' => 'ProfileController@save'])->where('user', '[0-9]+');
        Route::get('create_place', ['as' => 'createPlace', 'uses' => 'ProfileController@createPlace']);
        Route::post('create_place', ['as' => 'storePlace', 'uses' => 'ProfileController@storePlace']);
    });

    Route::post('save', ['as' => 'save', 'uses' => 'AllPlacesController@save']);
});
