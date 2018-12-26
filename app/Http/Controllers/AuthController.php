<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authRepository;

    public function __construct(UserRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }
    public function register(RegisterRequest $request)
    {
        $validatedData = $request->only(['name', 'email', 'password', 'is_admin']);

        return $this->authRepository->create($validatedData);

//        $validatedData['password'] = bcrypt($validatedData['password']);
//        $user = new User($validatedData);
//
//        $user->save();
//        return $user;
    }

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
