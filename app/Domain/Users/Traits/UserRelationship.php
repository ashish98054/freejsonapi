<?php

namespace App\Domains\Users\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Domain\Posts\Post;

trait UserRelationship
{
    public function postsRelation(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }
}