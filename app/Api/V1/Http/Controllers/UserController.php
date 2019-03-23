<?php

namespace App\Api\V1\Http\Controllers;

use League\Fractal\{Manager, Serializer\ArraySerializer, Resource\Item};
use App\Domain\Users\User;
use App\Api\V1\Http\Transformers\UserTransformer;

class UserController extends Controller
{
    private $manager;

    public function __construct(Manager $manager)
    {
        $this->manager = $manager->setSerializer(new ArraySerializer);
        $this->manager->parseIncludes($_GET['include']);
    }

    public function show($id)
    {
        return User::find($id);

        //$transformer = new Item(User::findOrFail($id), new UserTransformer);
        //return $this->manager->createData($transformer)->toArray();
    }
}