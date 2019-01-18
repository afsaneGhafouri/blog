<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RegisterRequest;

class UserController extends ApiAuthController
{
    public function register(RegisterRequest $request)
    {
        $user = parent::register($request);
        return response()->json($user, 201);
    }

    public function logout()
    {
        parent::logout();
        return response()->json(['message' => 'User Successfully logged out']);
    }
}