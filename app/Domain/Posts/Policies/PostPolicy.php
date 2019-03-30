<?php

namespace App\Domain\Posts\Policies;

use App\Domain\Users\User;
use App\Domain\Posts\Post;

class PostPolicy
{
    const UPDATE = "update";
    const DELETE = "delete";

    public function create(User $user, Post $post): bool
    {
        return $user->id() === $post->user()->id();
    }

    public function delete(User $user, Post $post): bool
    {
        return $user->id() === $post->user()->id();
    }
}