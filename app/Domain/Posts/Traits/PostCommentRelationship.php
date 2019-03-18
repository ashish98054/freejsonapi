<?php

namespace App\Domain\Posts\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Domain\Users\User;
use App\Domain\Posts\Post;

trait PostCommentRelationship
{
    public function userRelation(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function postRelation(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}