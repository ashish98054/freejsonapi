<?php

namespace App\Domain\Users;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Domains\Users\Traits\UserRelationship;

final class User extends Model
{
    use UserRelationship;

    const TABLE = 'users';

    protected $table = self::TABLE;

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function emailVerifiedAt(): Carbon
    {
        return $this->email_verified_at;
    }

    public function posts(): Collection
    {
        return $this->postsRelation;
    }
}