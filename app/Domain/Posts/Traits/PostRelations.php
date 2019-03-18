<?php

namespace App\Domain\Posts\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Domain\Users\User;

trait PostRelationship
{
    public function userRelations(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}