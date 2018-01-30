<?php

namespace App\Http\Controllers\API\V1;

use App\Entities\User;
use App\Http\Controllers\API\ApiController;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Transformers\UserTransformer;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends ApiController
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UserCreateRequest $request)
    {
        $user = $this->repository->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => \Hash::make($request->get('password')),
            'phone' => $request->get('phone', ''),
            'locate' => $request->get('locate', UserRepository::LOCATE_EN)
        ]);
        $userInfo = $this->repository->find($user->id);
        return  $this->response->item($userInfo, UserTransformer::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UserUpdateRequest $request)
    {
        $userId = $this->getUser()->id;
        $this->repository->update([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'locale' => $request->get('locale'),
        ], $userId);

        $userInfo = $this->repository->find($userId);
        if($userInfo instanceof User) {
            $userInfo->setAttribute('token', \JWTAuth::fromUser($userInfo));
        }
        return  $this->response->item($userInfo, UserTransformer::class);
    }
}
