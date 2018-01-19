<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\ApiController;
use App\Transformers\ProductDetailTransformer;
use App\Http\Requests;
use App\Repositories\ProductRepository;


class ProductsController extends ApiController
{
    public function show($id, ProductRepository $repository)
    {    	
        $product = $repository->getProductDetail($id);
        return $this->response->item($product, ProductDetailTransformer::class);
    }


}
