<?php

namespace App\Domain\Posts\Requests;

use App\Domain\Core\BaseFormRequest;

final class CreateUpdatePostCommentRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'body' => 'required|min:5'
        ];
    }
}