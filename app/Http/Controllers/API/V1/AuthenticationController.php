<?php

namespace App\Http\Controllers\API\V1;

use App\Entities\User;
use App\Http\Controllers\API\ApiController;
use App\Http\Requests\LoginRequest;
use App\Repositories\UserRepository;
use App\Transformers\UserTransformer;

class AuthenticationController extends ApiController
{
    public function login(LoginRequest $request, UserRepository $repository)
    {
        $credentials = $request->only('email', 'password');
        if (!\Auth::attempt($credentials)) {
            return $this->response->array(['data' => ['status' => -1, 'message' => 'Email or password is incorrect']]);
        }
        $user = $repository->getUserByEmail($credentials['email']);
        if ($user instanceof User) {
            $user->setAttribute('token', \JWTAuth::fromUser($user));
        }
        return $this->response->item($user, UserTransformer::class);
    }
}
