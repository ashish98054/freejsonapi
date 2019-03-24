<?php

namespace App\Domain\Users\Actions;

use Carbon\Carbon;
use App\Domain\Users\Exceptions\UserCreateError;
use App\Domain\Users\DataObjects\UserData;
use App\Domain\Users\User;

final class UserRegister
{
    public function execute(UserData $data): User
    {
        $this->assertEmailAddressIsUnique($data->email);

        $user = new User();
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = bcrypt($data->password);
        $user->email_verified_at = Carbon::now()->toDateTimeString();
        $user->save();
        $user->generateApiToken();

        return $user;
    }

    protected function assertEmailAddressIsUnique(string $email)
    {
        if (User::where('email', $email)->first()) {
            throw UserCreateError::duplicateEmailAddress($email);
        }
    }
}