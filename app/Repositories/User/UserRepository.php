<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function insertAll($data) : Bool
    {
        $insert = User::insert($data);
        logger($insert);
        return true;
    }
}
