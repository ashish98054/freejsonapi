<?php

namespace App\Domain\Posts;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Posts\Traits\PostCommentRelationship;
use App\Domain\Posts\Post;
use App\Domain\Users\User;
use App\Domain\Helpers\HasTimestamps;

final class PostComment extends Model
{
    use HasTimestamps, PostCommentRelationship;

    const TABLE = 'post_comments';

    protected $table = self::TABLE;

    public function id(): int
    {
        return $this->id;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function user(): User
    {
        return $this->userRelation;
    }

    public function post(): Post
    {
        return $this->postRelation;
    }
}