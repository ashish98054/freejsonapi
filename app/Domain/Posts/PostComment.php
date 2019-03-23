<?php

namespace App\Domain\Posts;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Posts\Traits\PostCommentRelationship;
use App\Domain\Helpers\HasTimestamps;
use App\Domain\Posts\Post;
use App\Domain\Users\User;

final class PostComment extends Model
{
    use PostCommentRelationship, HasTimestamps;

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

    public function post(): Post
    {
        return $this->postRelation;
    }

    public function user(): User
    {
        return $this->userRelation;
    }
}