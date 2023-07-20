<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if(auth()->check()){
        Route::get('/home', 'HomeController@index')->name('home');
    }else{
        return view('auth.login');
    }
});

Route::group(['prefix' => 'restore'], function(){
    Route::post('users/{id_user}', 'Settings\UsersController@restore')->name('restore.users');
    Route::post('operators/{id_operator}', 'OperatorController@restore')->name('restore.operators');
    Route::post('units/{id_unit}', 'Units\UnitController@restore')->name('restore.units');
    Route::post('agencies/{id_agency}', 'AgencieController@restore')->name('restore.agencies');
});
Route::get('subs', 'Services\AssignRegisterController@getSubs')->name('assign.subs');
Route::get('vans', 'Services\AssignRegisterController@getVans')->name('assign.vans');

// SECTION[Country_States] Dropdown Paises Estados
Route::post('getState', 'HomeController@getState')->name('fetchState');
Route::post('getCity', 'HomeController@getCity')->name('fetchCities');

Auth::routes(['register' => false]);

Route::view('/operator', 'operator');
Route::prefix('login')->group(function () {
    Route::get('operator', 'Auth\LoginController@showOperatorLoginForm');
    Route::post('operator', 'Auth\LoginController@operatorLogin');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('getCodeIATA', 'Controller@getCodeIATA')->name('fetchIata');
Route::post('getTariffAgency', 'Controller@getTariffAgency')->name('fetchTariff');
Route::post('getZone', 'Controller@getZone')->name('fetchZone');

Route::resources([
    'agencies' => 'AgencieController',
    'hoteles' => 'HotelController',
    'operators' => 'OperatorController',
    'bookings' => 'BookingController',
    // 'airlines' => 'AirlineController',
    'units' => 'Units\UnitController',
]);

Route::apiResources([
    'type_services' => 'TypeServiceController',
    'origen_destiny' =>'OriginDestinyController',

]);

Route::group(['prefix' => 'agencies'], function() {
    Route::post('add/{agency}', 'AgencieController@add')->name('agencies.add');
    Route::delete('remove/{agency}', 'AgencieController@remove')->name('agencies.remove');
});

Route::group(['prefix' => 'services'], function() {
    Route::resource('registers', 'Services\RegisterController');
    Route::resource('assign', 'Services\AssignRegisterController');
    Route::resource('status', 'Services\StatusRegisterController');
    Route::resource('operations', 'Services\OperationsController');
    Route::prefix('canceled')->group(function () {
        Route::get('/', 'Services\CanceledServices@index')->name('canceled.index');
    });
});

Route::group(['prefix' => 'units'], function(){
    Route::group(['prefix' => '{unit_id}'], function(){
    Route::resource('bitacora', 'Units\UnitServiceController');
    Route::resource('galery', 'Units\UnitGaleryController');
    });
});

Route::group(['prefix' => 'restore'], function(){
    Route::post('users/{id_user}', 'Settings\UsersController@restore')->name('restore.users');
    Route::post('operators/{id_operator}', 'OperatorController@restore')->name('restore.operators');
    Route::post('units/{id_unit}', 'Units\UnitController@restore')->name('restore.units');
    Route::post('agencies/{id_agency}', 'AgencieController@restore')->name('restore.agencies');
});

Route::group(['prefix', 'tariff'], function(){
    Route::group(['prefix' => 'tariff'], function() {
        Route::resource('taf_agencies', 'Tariff\TariffAgencyController');
        Route::resource('taf_hotels', 'Tariff\TariffHotelController');
    });
});

Route::group(['prefix', 'settings'], function(){
    Route::get('settings', 'Settings\SettingsController')->name('settings.index');
    Route::resource('users', 'Settings\UsersController');
    Route::resource('roles', 'Settings\RolesController');
    Route::resource('permissions', 'Settings\PermissionsController');
    Route::get('{locale}', 'Settings\SettingsController@lang');
});


