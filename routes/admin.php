<?php
Route::group(['middleware' => 'auth', 'as' => 'admin.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
        Route::get('{user}', ['as' => 'show', 'uses' => 'UserController@show'])->where('user', '[0-9]+');
        Route::get('{user}/delete', ['as' => 'destroy', 'uses' => 'UserController@destroy'])->where('user', '[0-9]+');
        Route::get('{user}/edit', ['as' => 'edit', 'uses' => 'UserController@edit'])->where('user', '[0-9]+');
        Route::post('{user}/update', ['as' => 'update', 'uses' => 'UserController@update'])->where('user', '[0-9]+');
    });

    Route::group(['prefix' => 'staffs', 'as' => 'staffs.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'StaffController@index']);
        Route::get('{staff}', ['as' => 'show', 'uses' => 'StaffController@show'])->where('staff', '[0-9]+');
        Route::get('{staff}/delete', ['as' => 'destroy', 'uses' => 'StaffController@destroy'])->where('staff', '[0-9]+');
        Route::get('{staff}/edit', ['as' => 'edit', 'uses' => 'StaffController@edit'])->where('staff', '[0-9]+');
        Route::post('{staff}/update', ['as' => 'update', 'uses' => 'StaffController@update'])->where('staff', '[0-9]+');
    });

    Route::group(['prefix' => 'places', 'as' => 'places.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'PlaceController@index']);
        Route::get('{place}', ['as' => 'show', 'uses' => 'PlaceController@show'])->where('place', '[0-9]+');
        Route::get('{place}/delete', ['as' => 'destroy', 'uses' => 'PlaceController@destroy'])->where('place', '[0-9]+');
    });

    Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'ContactController@index']);
        Route::get('/{user}', ['as' => 'reply', 'uses' => 'ContactController@reply'])->where('user', '[0-9]+');
        Route::post('/send', ['as' => 'send', 'uses' => 'ContactController@send']);
        Route::get('{comment}/delete', ['as' => 'destroy', 'uses' => 'ContactController@destroy']);
    });
});
