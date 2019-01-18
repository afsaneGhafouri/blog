<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Contracts\UserRepositoryInterface;

abstract class AuthController extends Controller
{
    protected $authRepository;

    public function __construct(UserRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }
    public function register(RegisterRequest $request)
    {
        $validatedData = $request->only(['name', 'email', 'password', 'is_admin']);
        $user = $this->authRepository->create($validatedData);
        return $user ;
    }

    public abstract function login(LoginRequest $request);

    public abstract function logout();


}