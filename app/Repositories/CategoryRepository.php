<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CategoryRepository
 * @package namespace App\Repositories;
 */
interface CategoryRepository extends MyRepository
{
    public function getCategoryFeatureIds();

    public function getCategoriesByListCateIds(array $cateIds = []);

//    public function getCategoriesFeature(array $ids = []);
}
