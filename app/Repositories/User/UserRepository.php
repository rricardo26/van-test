<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function insertAll($data) : Bool
    {
        foreach ($data as $item) {
            User::create([
                'name' => $item['name'],
                'username' => $item['username'],
                'email' => $item['email'],
                'address' => $item['address'],
                'phone' => $item['phone'],
                'website' => $item['website'],
                'company' => $item['company'],
            ]);
        }
        return true;
    }
}
