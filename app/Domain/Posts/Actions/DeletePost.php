<?php

namespace App\Domain\Posts\Actions;

use App\Domain\Posts\Post;

final class DeletePost
{
    public function execute(Post $post): bool
    {
        return $post->delete();
    }
}