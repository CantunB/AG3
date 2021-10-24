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

    public function user(Request $request){
        return $request->user();
    }

    public function logout(Request $request){
        $user = $request->user();
        $user->tokens()->delete();
        return 'Tokens are deleted';
    }
}
