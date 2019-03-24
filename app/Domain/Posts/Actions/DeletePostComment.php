<?php

namespace App\Domain\Posts\Actions;

use App\Domain\Posts\PostComment;

class DeletePostComment
{
    public function execute(PostComment $post_comment)
    {
        $post_comment->delete();
    }
}