<?php

use Illuminate\Support\Facades\Route;


Route::post('/login', ['Api\Auth\UserAuthController@login']);
Route::post('/login/operator', ['Api\Auth\OperatorAuthController@login']);

/* A group of routes that are protected by the `auth:sanctum` middleware.
*/
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', 'Api\Auth\UserAuthController@user');
    Route::get('user/revoke', 'Api\Auth\UserAuthController@logout');
});

/* A group of routes that are protected by the `auth:sanctum` middleware.
*/
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('operator/me', 'Api\Auth\OperatorAuthController@me');
    Route::get('operator/logout', 'Api\Auth\OperatorAuthController@logout');
});

Route::group(['prefix' => 'services'], function() {
    Route::get('assigned', 'Api\Services\AssignedController@index');
    Route::get('assigned/{id}', 'Api\Services\AssignedController@show');
    Route::post('assigned/status', 'Api\Services\AssignedController@store');
});

/* A group of routes that are protected by the `auth:sanctum` middleware.
*/
Route::group(['prefix' => 'operations'], function(){
    Route::post('new', 'Api\Services\AssignedController@new');
});
