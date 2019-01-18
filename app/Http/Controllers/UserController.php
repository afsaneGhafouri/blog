<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends WebAuthController
{
    public function registerForm()
    {
        return view('auth.register_form');
    }

    public function register(RegisterRequest $request)
    {
        $user = parent::register($request);

        return redirect('auth/login')
            ->with(
                'message',
                'user ' . $user->email . ' has successfully registered'
            );
    }

    public function loginForm()
    {
        return view('auth.login_form');
    }

    public function login(LoginRequest $request)
    {
       if (parent::login($request)) {
           return redirect('auth/profile');
       } else {
           return redirect()
               ->back()
               ->with(
                   'message', 'email / password is incorrect'
               );
       }
    }

    public function profile()
    {
        $user = Auth::user();
        $comments = $user->comments()->orderBy('id', 'desc')->take(5)->get();
        return view('auth.profile', compact('user','comments', 'post_slug'));
    }

    public function logout()
    {
        parent::logout();
        return redirect('auth/login');
    }

}

