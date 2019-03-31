<?php

namespace App\Domain\Core;

use Illuminate\Foundation\Http\FormRequest;

class BaseFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function validationData()
    {
        return count($this->json()->all()) ? $this->json()->all() : $this->all();
    }
}