<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminControllerBkp extends Controller
{

    public function LoginForm()
    {
        return view('admins.login_form');
    }

    public function Login(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) && Auth::user()->is_admin==1) {
            // Authentication passed.
            return redirect('admin/profile');
        } elseif (Auth::attempt($credentials) && Auth::user()->is_admin==0){
            return redirect()
                ->back()
                ->withErrors("you are not admin");
        } else {
              return redirect()
                ->back()
                ->withErrors("email / password is not correct");
        }
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admins.profile', compact('user'));
    }

    public function signout()
    {
        Auth::logout();
        return redirect('admin/login');
    }


}
