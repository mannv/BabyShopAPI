<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\ApiController;
use App\Repositories\ProductRepository;

class CategoryProductController extends ApiController
{
    public function index($id, ProductRepository $repository)
    {
        app('log')->debug('get products of category ' . $id);
        $paginateProducts = $repository->getProductsByCategoryId();
        return $this->response->array($paginateProducts);
    }
}
