<?php

namespace App\Domain\Posts\DataObjects;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Domain\Users\User;

final class PostData
{
    public $title;
    
    public $body;

    public $user;

    public $featured_image;

    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function setBody(?string $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function setFeaturedImage(?UploadedFile $featured_image): self
    {
        $this->featured_image = $featured_image;
        return $this;
    }

    public static function fromRequest(Request $request): self
    {
        return (new self)
            ->setTitle($request->input('title'))
            ->setBody($request->input('body'))
            ->setUser($request->user())
            ->setFeaturedImage($request->file('featured_image'));
    }
}