<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\ApiController;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Transformers\ProductTransformer;

class CategoryFeatureController extends ApiController
{
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $cateIds = $categoryRepository->getCategoryFeatureIds();
        if (empty($cateIds)) {
            return $this->response->array([]);
        }

        $categories = $categoryRepository->getCategoriesByListCateIds($cateIds);
        $result = $productRepository->productFeature($cateIds);
        if (!$result->isEmpty()) {
            $products = $productRepository->collectionTransformer($result, app(ProductTransformer::class));
            $this->mixData($categories, $products);
        }
        return $this->response->array($categories);
    }

    private function mixData(&$categories, $products)
    {
        $productCollection = collect($products['data']);
        foreach($categories['data'] as $index => $item) {
            $item['products'] = array_values($productCollection->where('cate_id', '=', $item['id'])->toArray());
            $categories['data'][$index] = $item;
        }
    }
}
