<?php

namespace App\Domain\Posts\Actions;

use App\Domain\Posts\DataObjects\PostCommentData;
use App\Domain\Posts\PostComment;

final class CreatePostComment
{
    private $post_comment;

    public function __construct(PostComment $post_comment)
    {
        $this->post_comment = $post_comment;
    }

    public function execute(PostCommentData $data): PostComment
    {
        $this->post_comment->postRelation()->associate($data->post);
        $this->post_comment->userRelation()->associate($data->user);
        $this->post_comment->body = $data->body;
        $this->post_comment->save();

        return $this->post_comment;
    }
}