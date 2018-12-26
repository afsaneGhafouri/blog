<?php

namespace App\Repositories\Contracts;

interface PostRepositoryInterface
{
    public function all();

    public function find(int $id);

    public function create(array $attribute);

    public function update(array $attribute, int $id);

    public function delete(int $id);
}
