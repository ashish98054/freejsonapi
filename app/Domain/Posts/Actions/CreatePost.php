<?php

namespace App\Domain\Posts\Actions;

use App\Domain\Posts\DataObjects\PostData;
use App\Domain\Posts\Post;

final class CreatePost
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function execute(PostData $data): Post
    {
        $this->post->title = $data->title;
        $this->post->slug = $data->title;
        $this->post->body = $data->body;
        $this->post->userRelation()->associate($data->user);
        $this->post->save();

        return $this->post;
    }
}