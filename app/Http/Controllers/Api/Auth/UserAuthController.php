<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class UserAuthController extends Controller
{

public function login(Request $request)
{
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
}

    public function user(Request $request){
        return $request->user();
    }

    public function logout(Request $request){
        $user = $request->user();
        $user->tokens()->delete();
        return 'Tokens are deleted';
    }
}
