<?php

namespace App\Domain\Users\Requests;

use App\Domain\Base\BaseFormRequest;
use App\Domain\Users\User;

class UserRegisterRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:' . User::TABLE,
            'password' => 'required'
        ];
    }
}