<?php

namespace App\Domain\Users\Exceptions;

class UserCreateError extends \Exception
{
    public static function duplicateEmailAddress(string $email)
    {
        return new static("User with given email {$email} already exists");
    }
}