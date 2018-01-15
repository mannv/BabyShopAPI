<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Presenters\ProductPresenter;
use App\Repositories\ProductRepository;
use App\Transformers\ProductTransformer;
use Carbon\Carbon;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    use Helpers;

    public function index($id, ProductRepository $repository)
    {
        app('log')->debug('get products of category ' . $id);
        $repository->setPresenter(ProductPresenter::class);
        $paginateProducts = $repository->getProductsByCategoryId();
        return view('welcome');
//        return $this->response->array($paginateProducts);
    }
}
