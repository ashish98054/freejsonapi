<?php

namespace App\Domain\Base;

use Illuminate\Http\Request;

class BaseFormRequest extends Request
{
    public function authorize()
    {
        return true;
    }
}