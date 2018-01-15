<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Transformers\CategoryTransformer;
use App\Transformers\ProductTransformer;
use Dingo\Api\Routing\Helpers;

use App\Http\Requests;
use App\Repositories\CategoryRepository;


class CategoriesController extends Controller
{

    use Helpers;
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
