<?php

namespace App\Api\V1\Http\Controllers;

use League\Fractal\{Manager, Serializer\ArraySerializer, Resource\Item};
use App\Api\V1\Http\Transformers\UserTransformer;

class UserController extends Controller
{
    private $manager;

    public function __construct(Manager $manager)
    {
        $this->manager = $manager->setSerializer(new ArraySerializer);
        $this->manager->parseIncludes(isset($_GET['include']) ? $_GET['include'] : '');
    }
}