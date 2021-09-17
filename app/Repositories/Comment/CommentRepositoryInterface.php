<?php

namespace App\Repositories\Comment;

use App\Models\Comment;

interface CommentRepositoryInterface
{
    public function insert($data) : Comment;
}
