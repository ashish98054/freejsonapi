<?php

namespace App\Api\V1\Http\Transformers;

use App\Domain\Posts\PostComment;
use App\Api\V1\Http\Transformers\UserTransformer;

class PostCommentTransformer extends BaseTransformer
{
    protected $defaultIncludes = ['user'];

    public function transform(PostComment $comment)
    {
        return [
            'id' => $comment->id(),
            'body' => $comment->body(),
            'created_at' => optional($comment->createdAt())->toDateTimestring(),
            'updated_at' => optional($comment->updatedAt())->toDateTimestring()
        ];
    }

    public function includeUser(PostComment $comment)
    {
        return $this->item($comment->user(), new UserTransformer);
    }
}