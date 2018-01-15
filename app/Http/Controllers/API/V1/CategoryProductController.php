<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Transformers\ProductTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    use Helpers;

    public function index($cateId, ProductRepository $repository)
    {
        $products = $repository->getProductsByCategoryId($cateId);
        return $this->response->collection($products, ProductTransformer::class);
    }
}
