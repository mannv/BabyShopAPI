<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\ApiController;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class CategoryFeatureController extends ApiController
{
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $cateIds = $categoryRepository->getCategoryFeatureIds();
        $result = $productRepository->productFeature($cateIds);
        dd($result);

    }
}
