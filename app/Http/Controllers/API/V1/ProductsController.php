<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\ApiController;
use App\Transformers\ProductTransformer;
use App\Http\Requests;
use App\Repositories\ProductRepository;


class ProductsController extends ApiController
{
    /**
     * @var ProductRepository
     */
    protected $repository;
    public function __construct(ProductRepository $repository)
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
        $products = $this->repository->all();
        return $this->response->collection($products, ProductTransformer::class);
    }
}
