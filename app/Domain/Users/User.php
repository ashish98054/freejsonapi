<?php

namespace App\Domain\Users;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use App\Domain\Helpers\HasTimestamps;
use App\Domains\Users\Traits\UserRelationship;

final class User extends Authenticatable
{
    use Notifiable;

    use UserRelationship, HasTimestamps;

    const TABLE = 'users';

    protected $table = self::TABLE;

    protected $dates = ['email_verified_at'];

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

    public function apiToken(): ?string
    {
        return $this->api_token;
    }

    public function emailVerifiedAt(): Carbon
    {
        return $this->email_verified_at;
    }

    public function posts(): Collection
    {
        return $this->postsRelation;
    }

    public function generateApiToken()
    {
        $token = str_random(60);

        $this->api_token =  hash('sha256', $token);
        $this->save();
    }

    public function revokeApiToken()
    {
        $this->api_token = null;
        $this->save();
    }
}