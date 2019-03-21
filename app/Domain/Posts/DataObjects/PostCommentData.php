<?php

namespace App\Domain\Posts\DataObjects;

use App\Domain\Users\User;
use App\Domain\Posts\Post;

class PostCommentData
{
    public $post;

    public $user;

    public $body;

    public function setPost(Post $post): self
    {
        $this->post = $post;
        return $this;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;
        return $this;
    }
}