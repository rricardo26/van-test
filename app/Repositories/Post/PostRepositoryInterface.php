<?php

namespace App\Repositories\Post;

interface PostRepositoryInterface
{
    public function insertAll($data) : Bool;
}
