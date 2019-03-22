<?php

namespace App\Api\V1;

use Illuminate\Support\ServiceProvider;

class ApiVersion1ServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes.php');
    }
}