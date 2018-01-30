<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\ApiController;
use App\Http\Requests\CartSubmitRequest;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderRepository;
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
    public function store(
        CartSubmitRequest $request,
        OrderRepository $orderRepository,
        OrderDetailRepository $orderDetailRepository,
        ProductRepository $productRepository
    ) {
        $cart = json_decode($request->get('cart'), true);
        if (empty($cart)) {
            return $this->returnEmpty();
        }

        $productIds = array_column($cart, 'id');
        $products = $productRepository->getListProductInIds($productIds);
        if(empty($products['data'])) {
            return $this->returnEmpty();
        }

        $products = $products['data'];
        $order = $orderRepository->create([
            'order_code' => uniqid(),
            'user_id' => $this->getUser()->id
        ]);

        foreach ($cart as $item) {
            $index = array_search($item['id'], array_column($products, 'id'));
            if($index === false) {
                continue;
            }
            $price = $products[$index]['price'];
            $orderDetailRepository->create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'price' => $item['amount'],
                'amount' => $price
            ]);
        }

        return $this->response->array(['data' => ['message' => 'submit order success']]);
    }
}
