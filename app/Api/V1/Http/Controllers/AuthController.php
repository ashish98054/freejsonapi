<?php

namespace App\Api\V1\Http\Controllers;

use League\Fractal\{Manager, Serializer\DataArraySerializer, Resource\Item};
use App\Domain\Users\Actions\{UserLogin, UserRegister};
use App\Domain\Users\Requests\UserLoginRequest;
use App\Domain\Users\Requests\UserRegisterRequest;
use App\Domain\Users\DataObjects\UserData;
use App\Api\V1\Http\Transformers\UserTransformer;

class AuthController extends Controller
{
    private $manager;

    public function __construct(Manager $manager)
    {
        $this->manager = $manager->setSerializer(new DataArraySerializer);
        $this->manager->parseIncludes(isset($_GET['include']) ? $_GET['include'] : '');
    }

    public function login(UserLoginRequest $request, UserLogin $login)
    {
        $user = $login->execute(UserData::fromRequest($request));

        switch (is_null($user)) {
            case true:
            return response()->json(['error' => 'invalid_credentials', 'message' => 'The user credentials were incorrect.'], 401);
            break;

            case false:
            return response()->json(['token' => $user->apiToken()]);
            break;
        }
    }

    public function register(UserRegisterRequest $request, UserRegister $register)
    {
        $user = $register->execute(UserData::fromRequest($request));
        $resource = new Item($user, new UserTransformer);

        return $this->manager->createData($resource)->toArray();
    }
}