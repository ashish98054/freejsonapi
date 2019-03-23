<?php

namespace App\Api\V1\Http\Transformers;

use League\Fractal\{TransformerAbstract, Resource\Item};
use App\Domain\Posts\Post;
use App\Api\V1\Http\Transformers\UserTransformer;

final class PostTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['user'];

    public function transform(Post $post)
    {
        return [
            'id' => $post->id(),
            'url' => route('api.v1.posts#show', $post->id()),
            'title' => $post->title(),
            'slug' => $post->slug(),
            'featured_image' => $post->featuredImage(),
            'body' => $post->body(),
            'created_at' => optional($post->createdAt())->toDateTimestring(),
            'updated_at' => optional($post->updatedAt())->toDateTimestring()
        ];
    }

    public function includeUser(Post $post)
    {
        return $this->item($post->user(), new UserTransformer);
    }
}