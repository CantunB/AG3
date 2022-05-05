<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Operator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\HasApiTokens;


class OperatorAuthController extends Controller
{
    use HasApiTokens;

    private $response = [
        'message' => null,
        'data' => null
    ];

    public function login(Request $request)
    {
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
    }

    public function me()
    {
        $operator = auth()->guard('driver')->user();
        return response()->json(['data' => $operator ], 200);
    }

    public function logout()
    {
        $logout = auth()->guard('driver')->user()->currentAccessToken()->delete();
        $this->response['message'] = 'success';
        return response()->json($this->response, 200);
    }

}
