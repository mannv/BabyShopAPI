<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\ApiController;
use App\Transformers\BannerTransformer;

use App\Http\Requests;
use App\Repositories\BannerRepository;


class BannersController extends ApiController
{
    /**
     * @var BannerRepository
     */
    protected $repository;

    public function __construct(BannerRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = $this->repository->all();
        return $this->response->collection($banners, BannerTransformer::class);
    }
}
