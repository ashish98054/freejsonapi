<?php

namespace App\Domain\Users\Actions;

use Illuminate\Support\Facades\Auth;
use App\Domain\Users\User;
use App\Domain\Users\DataObjects\UserData;

final class UserLogin
{
    public function execute(UserData $data): ?User
    {
        if (Auth::attempt(['email' => $data->email, 'password' => $data->password])) {
            $user = Auth::user();
            $user->generateApiToken();
            return $user;
        }

        return null;
    }
}