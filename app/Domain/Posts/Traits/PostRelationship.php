<?php

namespace App\Domain\Posts\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Domain\Users\User;
use App\Domain\Posts\PostComment;

trait PostRelationship
{
    public function userRelation(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function commentsRelation(): HasMany
    {
        return $this->hasMany(PostComment::class, 'post_id', 'id');
    }
}