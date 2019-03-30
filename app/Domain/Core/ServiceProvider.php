<?php

namespace App\Domain\Core;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Domain\Posts\{Post, Policies\PostPolicy};

class ServiceProvider extends BaseServiceProvider
{
    protected $policies = [
        Post::class, PostPolicy::class
    ];

    public function boot()
    {
        foreach ($this->policies as $key => $value) {
            Gate::policy($key, $value);
        }
    }
}