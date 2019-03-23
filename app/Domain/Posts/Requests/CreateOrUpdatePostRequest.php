<?php

namespace App\Domain\Posts\Requests;

use App\Domain\Base\BaseFormRequest;
use App\Domain\Posts\DataObjects\PostData;

final class CreateOrUpdatePostRequest extends BaseFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}