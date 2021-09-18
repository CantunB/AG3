<?php

use App\Models\Operator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
    $user = User::where('email', $request->email)->first();
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    return $user->createToken($request->device_name)->plainTextToken;
});

Route::post('/sanctum/operator/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
    $user = Operator::where('email', $request->email)->first();
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    return $user->createToken($request->device_name)->plainTextToken;
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', 'Api\Auth\UserAuthController@user');
    Route::get('user/revoke', 'Api\Auth\UserAuthController@logout');
});

//Route::post('auth/login', 'Api\Auth\OperatorAuthController@login')->middleware(['operator']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('auth/me', 'Api\Auth\OperatorAuthController@me');
    Route::get('auth/logout', 'Api\Auth\OperatorAuthController@logout');
});
