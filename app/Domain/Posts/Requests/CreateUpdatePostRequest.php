<?php

namespace App\Domain\Posts\Requests;

use App\Domain\Core\BaseFormRequest;

final class CreateUpdatePostRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required'
        ];
    }
}