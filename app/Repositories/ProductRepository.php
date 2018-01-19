<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductRepository
 * @package namespace App\Repositories;
 */
interface ProductRepository extends MyRepository
{
    public function getProductsByCategoryId();
    public function getFlashSaleOnMainScreen();
    public function getProductIsSale();
    public function productFeature(array $cateIds = []);
    public function getProductDetail($id);
    public function getListProductInIds(array $ids = []);
}
