<?php

namespace App\Domain\Posts\Actions;

use App\Domain\Posts\DataObjects\PostData;
use App\Domain\Posts\Post;

final class CreatePost
{
    public function execute(PostData $data): Post
    {
        $post = new Post();
        $post->title = $data->title;
        $post->body = $data->body;
        $post->userRelations()->associate($data->user);
        $post->save();

        return $post;
    }
}