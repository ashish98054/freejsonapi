<?php

namespace App\Domain\Users\Requests;

use App\Domain\Base\BaseFormRequest;

class UserRegisterRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
}