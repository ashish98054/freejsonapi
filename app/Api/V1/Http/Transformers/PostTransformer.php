<?php

namespace App\Api\V1\Http\Transformers;

use App\Domain\Posts\Post;
use App\Api\V1\Http\Transformers\UserTransformer;
use App\Api\V1\Http\Transformers\PostCommentTransformer;

final class PostTransformer extends BaseTransformer
{
    protected $defaultIncludes = ['user'];
    protected $availableIncludes = ['comments'];

    public function transform(Post $post)
    {
        return $this->transformWithFieldsFilter([
            'id' => $post->id(),
            'url' => route('api.v1.posts#show', $post->id()),
            'comments_url' => route('api.v1.posts#comments', $post->id()),
            'title' => $post->title(),
            'slug' => $post->slug(),
            'featured_image' => $post->featuredImage(),
            'body' => $post->body(),
            'created_at' => optional($post->createdAt())->toDateTimestring(),
            'updated_at' => optional($post->updatedAt())->toDateTimestring()
        ]);
    }

    public function includeUser(Post $post)
    {
        return $this->item($post->user(), new UserTransformer);
    }

    public function includeComments(Post $post)
    {
        return $this->collection($post->commentsRelation()->paginate(), new PostCommentTransformer);
    }
}