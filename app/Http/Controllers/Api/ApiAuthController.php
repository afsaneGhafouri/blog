<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\AuthController;
use App\Http\Requests\LoginRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiAuthController extends AuthController
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
        return response()->json(compact('token'));
    }

    public function logout()
    {
        auth()->logout();
    }

}