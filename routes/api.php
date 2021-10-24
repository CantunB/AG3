<?php

use App\Models\Operator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

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

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
    $user = User::where('email', $request->email)->first();
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages(['email' => ['The provided credentials are incorrect.'] ]);
    }
    $token = $user->createToken($request->device_name)->plainTextToken;
    return response()->json(['token' => $token], 200);

});

Route::post('/login/operator', function (Request $request) {
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


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', 'Api\Auth\UserAuthController@user');
    Route::get('user/revoke', 'Api\Auth\UserAuthController@logout');
});

 Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('operator/me', 'Api\Auth\OperatorAuthController@me');
    Route::get('operator/logout', 'Api\Auth\OperatorAuthController@logout');
});

Route::apiResources([
    '/services' => 'Api\ServicesController',
]);
