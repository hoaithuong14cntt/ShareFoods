<?php
Route::group(['middleware' => 'auth', 'as' => 'admin.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
        Route::get('{user}', ['as' => 'show', 'uses' => 'UserController@show'])->where('user', '[0-9]+');
        Route::get('{user}/delete', ['as' => 'destroy', 'uses' => 'UserController@destroy'])->where('user', '[0-9]+');
    });

    Route::group(['prefix' => 'staffs', 'as' => 'staffs.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'StaffController@index']);
        Route::get('{staff}', ['as' => 'show', 'uses' => 'StaffController@show'])->where('staff', '[0-9]+');
        Route::get('{staff}/delete', ['as' => 'destroy', 'uses' => 'StaffController@destroy'])->where('staff', '[0-9]+');
    });

    Route::group(['prefix' => 'places', 'as' => 'places.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'PlaceController@index']);
        Route::get('{id}', ['as' => 'destroy', 'uses' => 'PlaceController@destroy']);
    });

    Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'ContactController@index']);
        Route::get('{id}', ['as' => 'destroy', 'uses' => 'ContactController@destroy']);
    });
});
