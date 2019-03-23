<?php

namespace App\Domain\Users\Actions;

use Carbon\Carbon;
use App\Domain\Users\DataObjects\UserData;
use App\Domain\Users\User;

final class UserRegister
{
    public function execute(UserData $data): User
    {
        $user = new User();
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = bcrypt($data->password);
        $user->email_verified_at = Carbon::now()->toDateTimeString();
        $user->save();

        return $user;
    }
}