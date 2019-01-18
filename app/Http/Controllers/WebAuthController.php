<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class WebAuthController extends AuthController
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        return Auth::attempt($credentials);
    }

    public function logout()
    {
       Auth::logout();
    }

}
