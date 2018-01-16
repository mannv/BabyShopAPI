<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductRepository
 * @package namespace App\Repositories;
 */
interface ProductRepository extends RepositoryInterface
{
    public function getProductsByCategoryId();
    public function getFlashSaleOnMainScreen();

    public function productFeature(array $cateIds = []);
}
