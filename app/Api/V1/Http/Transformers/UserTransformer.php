<?php

namespace App\Api\V1\Http\Transformers;

use League\Fractal;
use App\Domain\Users\User;

final class UserTransformer extends Fractal\TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id' => $user->id(),
            'url' => route('api.v1.users#show'),
            'posts_url' => route('api.v1.posts#index'),
            'name' => $user->name(),
            'email' => $user->email(),
            'email_verified_at' => $user->emailVerifiedAt(),
            'created_at' => optional($user->createdAt())->toDateTimestring(),
            'updated_at' => optional($user->updatedAt())->toDateTimestring()
        ];
    }
}