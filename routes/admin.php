<?php
Route::group(['as' => 'admin.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
        Route::get('show/{id}', ['as' => 'show', 'uses' => 'UserController@show']);
        Route::get('{id}', ['as' => 'destroy', 'uses' => 'UserController@destroy']);
    });
});
