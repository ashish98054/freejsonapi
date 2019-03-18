<?php

namespace App\Domain\Posts;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Domain\Posts\Traits\PostRelationship;
use App\Domain\Helpers\HasSlug;

final class Post extends Model
{
    use HasSlug, PostRelationship;

    const TABLE = 'posts';

    protected $table = self::TABLE;

    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function slug(): string
    {
        return $this->slug;
    }

    public function featuredImage(): string
    {
        return $this->featured_image;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function user(): User
    {
        return $this->userRelations;
    }

    public function createdAt(): Carbon
    {
        return $this->created_at;
    }

    public function updatedAt(): Carbon
    {
        return $this->updated_at;
    }
}