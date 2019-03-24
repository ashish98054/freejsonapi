<?php

namespace App\Domain\Posts\Requests;

use App\Domain\Base\BaseFormRequest;

final class CreatePostCommentRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'body' => 'required|min:5'
        ];
    }
}