<?php

namespace App\Domain\Posts\Actions;

use App\Domain\Posts\PostComment;

class DeletePostComment
{
    public function execute(PostComment $post_comment): bool
    {
        return $post_comment->delete();
    }
}