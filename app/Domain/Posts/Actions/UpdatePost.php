<?php

namespace App\Domain\Posts\Actions;

use App\Domain\Posts\DataObjects\PostData;
use App\Domain\Posts\Post;

final class UpdatePost
{
    public function execute(Post $post, PostData $data)
    {
        $post->title = $data->title;
        $post->body = $data->body;
        $post->save();

        return $post;
    }
}