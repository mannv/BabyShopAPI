<?php

namespace App\Http\Controllers;

use App\Transformers\BannerTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\BannerRepository;


class BannersController extends Controller
{
    use Helpers;

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
