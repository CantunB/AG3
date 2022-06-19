<?php

use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

// Route::post('/login', ['Api\Auth\UserAuthController@login']);
// Route::post('/login/operator', ['Api\Auth\OperatorAuthController@login']);
Route::post('login/operator', function(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
    $operator = Operator::where('email', $request->email)->first();
    if (! $operator || ! Hash::check($request->password, $operator->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    $token = $operator->createToken($request->device_name)->plainTextToken;
    return response()->json([ 'operator' => $operator, 'token' => $token], 200);
});

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

    Route::post('assigned/aware', 'Api\Services\AssignedController@aware');
    Route::post('assigned/slope', 'Api\Services\AssignedController@slope');
    Route::post('assigned/onboard', 'Api\Services\AssignedController@onboard');
    Route::post('assigned/noshow', 'Api\Services\AssignedController@noshow');
    Route::post('assigned/save', 'Api\Services\AssignedController@save');
    Route::post('assigned/finalized', 'Api\Services\AssignedController@finalized');
    Route::post('assigned/charges', 'Api\Services\AssignedController@charges');
});

/* A group of routes that are protected by the `auth:sanctum` middleware.
*/
Route::group(['prefix' => 'operations'], function(){
    Route::post('new', 'Api\Services\AssignedController@new');
});

Route::group(['prefix'=> 'unit'], function(){
    Route::get('all','Api\Unit\UnitController@index');
    Route::post('FuelLoad', 'Api\Unit\FuelController@store');
});

