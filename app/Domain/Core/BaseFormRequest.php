<?php

namespace App\Domain\Core;

use Illuminate\Foundation\Http\FormRequest;

class BaseFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
}