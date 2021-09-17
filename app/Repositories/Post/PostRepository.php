<?php

namespace App\Repositories\Post;

use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function insertAll($data) : Bool
    {
        Post::insert($data);
        return true;
    }
}
