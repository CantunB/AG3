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
    //return view('welcome');
    if(auth()->check()){
        return view('home');
    }else{
        return view('auth.login');
    }
});

//Language Translation
//Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Auth::routes(['register' => false]);
Route::get('/login/operator', 'Auth\LoginController@showOperatorLoginForm');
Route::post('/login/operator', 'Auth\LoginController@operatorLogin');
Route::view('/operator', 'operator');

Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'agencies' => 'AgencieController',
    'operators' => 'OperatorController',
    'airlines' => 'AirlineController',
    'units' => 'Units\UnitController',
    //'bitacora' => '',
    'registers' => 'RegisterController',
    'assign' => 'AssignRegisterController',
    'users' => 'UserController'
]);

Route::apiResources([
    'services' => 'TypeServiceController',
    'origen_destiny' =>'OriginDestinyController',

]);

Route::group(['prefix' => 'units'], function(){
    Route::group(['prefix' => '{unit_id}'], function($unit_id){
      Route::resource('bitacora', 'Units\UnitServiceController');
      Route::resource('galery', 'Units\UnitGaleryController');
    });
  });

Route::group(['web', 'settings'], function(){
    Route::get('users','Controller@users')->name('settings.users');
    Route::get('roles', 'Controller@roles')->name('settings.roles');
    Route::get('permissions', 'Controller@permissions')->name('settings.permissions');
    Route::get('{locale}', 'Controller@lang');
});


