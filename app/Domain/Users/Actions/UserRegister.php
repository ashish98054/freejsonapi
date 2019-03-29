<?php

namespace App\Domain\Users\Actions;

use Carbon\Carbon;
use App\Domain\Users\Exceptions\UserCreateError;
use App\Domain\Users\DataObjects\UserData;
use App\Domain\Users\User;

final class UserRegister
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;    
    }

    public function execute(UserData $data): User
    {
        $this->assertEmailAddressIsUnique($data->email);

        $this->user->name = $data->name;
        $this->user->email = $data->email;
        $this->user->password = bcrypt($data->password);
        $this->user->email_verified_at = Carbon::now()->toDateTimeString();
        $this->user->save();
        $this->user->generateApiToken();

        return $this->user;
    }

    protected function assertEmailAddressIsUnique(string $email)
    {
        if (User::where('email', $email)->first()) {
            throw UserCreateError::duplicateEmailAddress($email);
        }
    }
}