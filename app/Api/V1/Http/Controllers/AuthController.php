<?php

namespace App\Api\V1\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use League\Fractal\{Manager, Serializer\DataArraySerializer, Resource\Item };
use App\Api\V1\Http\Transformers\UserTransformer;
use App\Domain\Users\Actions\{UserLogin, UserRegister};
use App\Domain\Users\Requests\UserLoginRequest;
use App\Domain\Users\Requests\UserRegisterRequest;
use App\Domain\Users\DataObjects\UserData;

class AuthController extends Controller
{
    private $manager;
    
    public function __construct(Manager $manager)
    {
        $this->manager = $manager->setSerializer(new DataArraySerializer);
        $this->middleware(['auth:api'])->only('logout', 'authenticatedUser');
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

        return response()->json(['token' => $user->apiToken()]);
    }

    public function authenticatedUser()
    {
        $user = Auth::user();
        $resource = new Item($user, new UserTransformer);

        return $this->manager->createData($resource)->toArray();
    }

    public function logout()
    {
        Auth::user()->revokeApiToken();

        return response(null, 204);
    }
}