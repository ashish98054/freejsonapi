<?php

namespace App\Api\V1\Http\Controllers;

use App\Domain\Users\Actions\{UserLogin, UserRegister};
use App\Domain\Users\Requests\UserLoginRequest;
use App\Domain\Users\Requests\UserRegisterRequest;
use App\Domain\Users\DataObjects\UserData;

class AuthController extends Controller
{
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
}