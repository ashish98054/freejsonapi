<?php

namespace App\Api\V1\Http\Controllers;

use League\Fractal\{Manager, Serializer\DataArraySerializer, Resource\Item, Resource\Collection, Pagination\IlluminatePaginatorAdapter};
use App\Api\V1\Http\Transformers\UserTransformer;
use App\Domain\Users\User;

class UserController extends Controller
{
    private $manager;

    public function __construct(Manager $manager)
    {
        $this->manager = $manager->setSerializer(new DataArraySerializer);
        $this->manager->parseIncludes(isset($_GET['include']) ? $_GET['include'] : '');
    }

    public function index()
    {
        $users = User::latest()->paginate();
        $resource = new Collection($users, new UserTransformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($users));

        return $this->manager->createData($resource)->toArray();
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $resource = new Item($user, new UserTransformer);

        return $this->manager->createData($resource)->toArray();
    }
}