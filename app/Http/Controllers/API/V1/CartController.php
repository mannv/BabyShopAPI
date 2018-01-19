<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\ApiController;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class CartController extends ApiController
{

    public function index(Request $request)
    {
        $ids = $request->get('id', '');
        if (empty($ids)) {
            return $this->returnEmpty();
        }

        $productIds = explode(',', $ids);
        $productRepository = app(ProductRepository::class);
        $products = $productRepository->getListProductInIds($productIds);
        return $this->response->array($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->response->array($request->all());
    }
}
