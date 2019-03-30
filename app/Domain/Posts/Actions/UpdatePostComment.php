<?php

namespace App\Domain\Posts\Actions;

use App\Domain\Posts\DataObjects\PostCommentData;
use App\Domain\Posts\PostComment;

final class UpdatePostComment
{
    public function execute(PostComment $post_comment, PostCommentData $data): PostComment
    {
        $post_comment->postRelation()->associate($data->post);
        $post_comment->userRelation()->associate($data->user);
        $post_comment->body = $data->body;
        $post_comment->save();

        return $post_comment;
    }
}