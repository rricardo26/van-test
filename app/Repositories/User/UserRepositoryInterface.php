<?php

namespace App\Repositories\User;

use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function insertAll($data) : Bool;
    public function getAll() : Collection;
    public function getPosts() : Collection;
}
