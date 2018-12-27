<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends AuthController
{

    public function register(RegisterRequest $request)
    {
        $request->merge(['is_admin' => true]);
        $user = parent::register($request);
      //  $user = $this->adminRepository->register()
        return redirect('admin/register')
            ->with(
                'message',
                'A new  admin with email : ' . $user->email . ' has successfully registered'
            );
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && !$user->is_admin) {
            return redirect()
                ->back()
                ->withErrors("you are not admin");
        }

        $is_authenticated = parent::login($request);

        if ($is_authenticated) {
            // Authentication passed.
            return redirect('admin/profile');
        } else {
            return redirect()
                ->back()
                ->withErrors("email / password is not correct");
        }
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admins.auth.profile', compact('user'));
    }

    public function logout()
    {
        parent::logout();
        redirect('admin/login');
    }
}
