<?php

namespace App\Domain\Base;

use Illuminate\Foundation\Http\FormRequest;

class BaseFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
}