<?php

namespace App\Domain\Posts;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Posts\Traits\PostCommentRelationship;
use App\Domain\Helpers\HasTimestamps;

final class PostComment extends Model
{
    use PostCommentRelationship, HasTimestamps;

    const TABLE = 'post_comments';

    protected $table = self::TABLE;
}