<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Transformers\ProductTransformer;
use Dingo\Api\Routing\Helpers;

use App\Http\Requests;
use App\Repositories\ProductRepository;


class ProductsController extends Controller
{

    use Helpers;
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
