<?php

namespace App\Repositories\Post;

use App\Models\Post;
interface PostRepositoryInterface
{
    public function insertAll($data) : Bool;
    public function getRandom() : Post;
}
