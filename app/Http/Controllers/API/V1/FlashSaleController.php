<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\ApiController;
use App\Repositories\ProductRepository;

class FlashSaleController extends ApiController
{
    public function index(ProductRepository $productRepository)
    {
        app('log')->debug('get list flash sale on main screen');
        $paginateProducts = $productRepository->getFlashSaleOnMainScreen();
        return $this->response->array($paginateProducts);
    }
}
