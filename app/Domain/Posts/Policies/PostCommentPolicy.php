<?php

namespace App\Domain\Posts\Policies;

use App\Domain\Users\User;
use App\Domain\Posts\PostComment;

class PostCommentPolicy
{
    const UPDATE = "update";
    const DELETE = "delete";

    public function update(User $user, PostComment $post_comment): bool
    {
        return $post_comment->user()->id() === $user->id();
    }

    public function delete(User $user, PostComment $post_comment): bool
    {
        return $post_comment->user()->id() === $user->id();
    }
}