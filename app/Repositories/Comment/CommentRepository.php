<?php

namespace App\Repositories\Comment;

use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    public function insert($data) : Comment
    {
        return Comment::create($data);
    }
}
