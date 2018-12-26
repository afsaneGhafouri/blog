<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function registerForm()
    {
        return view('users.register_form');
    }

    public function create(RegisterRequest $request)
    {
        // required fields check
        $validatedData = $request->only(['name', 'email', 'password']);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = new User($validatedData);

        $user->save();

        return redirect('auth/login')
            ->with(
                'message',
                'user ' . $user->email . ' has successfully registered'
            );
    }

    public function loginForm()
    {
        return view('users.login_form');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed.
            return redirect('profile');
        } else {
            return redirect()
                ->back()
                ->with(
                    'message','email / password is incorrect'
                );
        }
    }

    public function profile()
    {
     // $user = Auth::user();
      return view('users.profile');
    }

    public function signout()
    {
        Auth::logout();
        return redirect('auth/login');
    }



}
