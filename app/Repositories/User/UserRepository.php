<?php

namespace App\Repositories\User;

use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Traits\Auths;

class UserRepository implements UserRepositoryInterface
{
    use Auths;

    public function insertAll($data) : Bool
    {
        foreach ($data as $item) {
            User::create([
                'name' => $item['name'],
                'password' => bcrypt('secret'),
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

    public function getAll() : Collection
    {
        return User::all();
    }

    public function getPosts() : Collection
    {
        return $this->currentUser()->posts;
    }
}
