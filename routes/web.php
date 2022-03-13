<?php

use App\Http\Controllers\AssignRegisterController;
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

Route::get('subs', 'AssignRegisterController@getSubs')->name('assign.subs');
Route::get('vans', 'AssignRegisterController@getVans')->name('assign.vans');

Auth::routes(['register' => false]);

Route::get('/', function () {
    if(auth()->check()){
        return view('home');
    }else{
        return redirect()->route('login');
    }
});

//Language Translation
//Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::view('/operator', 'operator');
Route::prefix('login')->group(function () {
    Route::get('operator', 'Auth\LoginController@showOperatorLoginForm');
    Route::post('operator', 'Auth\LoginController@operatorLogin');
    Route::get('agency', 'Auth\LoginController@showAgencyLoginForm');
    Route::post('agency', 'Auth\LoginController@agencyLogin');
});



Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'agencies' => 'AgencieController',
    'operators' => 'OperatorController',
    'bookings' => 'BookingController',
    // 'airlines' => 'AirlineController',
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
    Route::get('users','Settings\SettingsController@users')->name('settings.users');
    Route::get('roles', 'Settings\SettingsController@roles')->name('settings.roles');
    Route::get('permissions', 'Settings\SettingsController@permissions')->name('settings.permissions');
    Route::get('{locale}', 'Settings\SettingsController@lang');
});

//     Route::get('assign_','Settings\SettingsController@users')->name('settings.users');
    //  Route::get('users','Settings\SettingsController@users')->name('settings.users');

Route::post('getCodeIATA', 'Controller@getCodeIATA')->name('fetchIata');
