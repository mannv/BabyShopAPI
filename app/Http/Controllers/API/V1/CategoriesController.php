<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\ApiController;
use App\Transformers\CategoryTransformer;
use App\Http\Requests;
use App\Repositories\CategoryRepository;


class CategoriesController extends ApiController
{
    /**
     * @var CategoryRepository
     */
    protected $repository;

    public function __construct(CategoryRepository $repository)
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
        $categories = $this->repository->all();
        return $this->response->collection($categories, CategoryTransformer::class);
    }

    public function detail($id)
    {
        $cate = $this->repository->find($id);
        return $this->response->item($cate, CategoryTransformer::class);
    }
}
