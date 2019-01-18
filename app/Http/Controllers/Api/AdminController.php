<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;

class AdminController extends ApiAuthController
{
    public function register(RegisterRequest $request)
    {
        $request->merge(['is_admin' => true]);
        $user = parent::register($request);
        return response()->json($user, 201);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && !$user->is_admin) {
            return response()->json(['error' => 'you are not admin'],401);
        }
        $is_authenticated = parent::login($request);

        if ($is_authenticated) {
            return response()->json(['message' => 'User Successfully logged in']);
        } else {
            return response()->json(['error' => 'email / password is not correct']);
        }
    }

    public function logout()
    {
        parent::logout();
        return response()->json(['message' => 'Admin Successfully logged out']);
    }

}