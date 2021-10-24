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
