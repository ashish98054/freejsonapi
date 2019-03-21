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

    public function postData(): PostData
    {
        return (new PostData())
            ->setTitle($this->input('title'))
            ->setFeaturedImage($this->file('featured_image'))
            ->setBody($this->input('body'))
            ->setUser($this->user());
    }
}