<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BannerRepository
 * @package namespace App\Repositories;
 */
interface MyRepository extends RepositoryInterface
{
    public function collectionTransformer($data = null, $transformer = null);
}
