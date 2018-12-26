<?php

namespace App\Repositories\RDBMS;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{
    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function create(array $authAttribute)
    {
       $authAttribute['password'] = bcrypt($authAttribute['password']);
       return $this->model->create($authAttribute);
    }


}
