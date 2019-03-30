<?php

namespace App\Domain\Users\Requests;

use App\Domain\Core\BaseFormRequest;
use App\Domain\Users\DataObjects\UserData;

class UserLoginRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function userLoginData(): UserData
    {
        return (new UserData)
            ->setEmail($this->input('email'))
            ->setPassword($this->input('password'));
    }
}