<?php
Route::group(['as' => 'admin.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
    Route::group(['prefix' => 'users', 'as' => 'users'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
    });
});
