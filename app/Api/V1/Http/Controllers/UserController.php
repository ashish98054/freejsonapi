<?php

namespace App\Api\V1\Http\Controllers;

use League\Fractal\{Manager, Serializer\ArraySerializer, Resource\Item};
use App\Domain\Users\{User, Actions\UserLogin};
use App\Api\V1\Http\Transformers\UserTransformer;
use App\Domain\Users\Requests\UserLoginRequest;
use App\Domain\Users\DataObjects\UserData;

class UserController extends Controller
{
    private $manager;

    public function __construct(Manager $manager)
    {
        $this->manager = $manager->setSerializer(new ArraySerializer);
        $this->manager->parseIncludes(isset($_GET['include']) ? $_GET['include'] : '');
    }

    public function login(UserLoginRequest $request, UserLogin $login)
    {
        $user = $login->execute(UserData::fromRequest($request));
        
        if ($user) {
            return response()->json(['token' => $user->apiToken()]);
        }

        return response()->json(['error' => 'invalid_credentials', 'message' => 'The user credentials were incorrect.'], 401);
    }

    public function register()
    {
        
    }
}