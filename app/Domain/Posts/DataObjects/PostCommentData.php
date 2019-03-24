<?php

namespace App\Domain\Posts\DataObjects;

use Illuminate\Http\Request;
use App\Domain\Users\User;
use App\Domain\Posts\Post;

class PostCommentData
{
    public $post;

    public $user;

    public $body;

    public function setPost(?Post $post): self
    {
        $this->post = $post;
        return $this;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function setBody(?string $body): self
    {
        $this->body = $body;
        return $this;
    }

    public static function fromRequest(Request $request): self
    {
        return (new self)
            ->setPost(Post::find($request->route('post')))
            ->setBody($request->input('body'))
            ->setUser($request->user());
    }
}