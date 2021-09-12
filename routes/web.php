<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    //'users' => 'UserController',
    'agencies' => 'AgencieController',
    'operators' => 'OperatorController',
    'airlines' => 'AirlineController',
    'units' => 'UnitController',
    'services' => 'TypeServiceController',
    'registers' => 'RegisterController'
  //  'settings' => 'Controller',
 ]);

Route::group(['web', 'settings'], function(){
    Route::get('users','Controller@users')->name('settings.users');
    Route::get('roles', 'Controller@roles')->name('settings.roles');
    Route::get('permissions', 'Controller@permissions')->name('settings.permissions');
});

