<?php

Route::group(['prefix' => '/auth'], function () {
    // Route::post('login', 'AuthController@login');
    Route::post('login', 'Auth\AccessTokenController@issueToken');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

//! Unions
Route::group(['middleware'  =>  ['auth:api']], function () {
    Route::group(['prefix'  =>  '/unions'], function () {
        Route::get('/','UnionController@index');
        Route::get('/{id}', 'UnionController@show');
        Route::post('/', 'UnionController@store');
        Route::put('/{id}', 'UnionController@update');
        // Route::put('/{id}', array('middleware' => 'cors', 'uses' => 'UnionController@update'));
        Route::delete('/{id}', 'UnionController@destroy');
    });
});

//! Groups
Route::group(['middleware'  =>  ['auth:api']], function () {
    Route::group(['prefix'  =>  '/groups'], function () {
        Route::get('/', 'GroupController@index');
        Route::get('/{id}', 'GroupController@indexFromParams');
        Route::post('/', 'GroupController@store');
        Route::put('/{id}', 'GroupController@update');
        Route::delete('/{id}', 'GroupController@destroy');
    });
    Route::get('group/{id}', 'GroupController@show');
});

//! Churches
Route::group(['middleware'  =>  ['auth:api']], function () {
    Route::group(['prefix'  =>  '/churches'], function () {
        Route::get('/', 'ChurchController@index');
        Route::get('/{id}', 'ChurchController@indexFromParams');
        Route::post('/', 'ChurchController@store');
        Route::put('/{id}', 'ChurchController@update');
        Route::delete('/{id}', 'ChurchController@destroy');
    });
    Route::get('church/{id}', 'ChurchController@show');
});

//! Departments
Route::group(['middleware'  =>  ['auth:api']], function () {
    Route::group(['prefix'  =>  '/departments'], function () {
        Route::get('/', 'DepartmentController@index');
        Route::get('/{user_id}', 'DepartmentController@indexFromParams');
        Route::post('/', 'DepartmentController@store');
        Route::put('/{id}', 'DepartmentController@update');
        Route::delete('/{id}', 'DepartmentController@destroy');
    });
    Route::get('department/{id}', 'DepartmentController@show');
});

//Advertisements
Route::group(['middleware'  =>  ['auth:api']], function () {
    Route::group(['prefix'  =>  '/advertisements'], function () {
        Route::get('/', 'AdvertisementController@getAdvertisements');
        Route::post('', 'AdvertisementController@store');
        Route::put('/{id}', 'AdvertisementController@update');
        Route::delete('/{id}', 'AdvertisementController@destroy');
    });
    Route::post('advertisement', 'AdvertisementController@show');
});

Route::group(['prefix'  =>  '/feather'], function () {
    Route::post('/advertisements', 'AdvertisementController@index');
});

Route::group(['prefix'  =>  '/search'], function () {
    Route::post('/advertisements', 'FeatherController@searchAdvertisement');
    Route::post('/users', 'FeatherController@searchUsers');
});

Route::group(['middleware'  =>  ['auth:api']], function () {
    Route::group(['prefix'  =>  '/test'], function () {
        Route::put('/ad/update/{id}', 'AdvertisementController@update');
    });
});
