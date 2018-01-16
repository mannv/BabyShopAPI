<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Category;

/**
 * Class CategoryRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getCategoryFeatureIds()
    {
        $table = 'products';
        $result = \DB::table($table)
            ->where(['feature' => 1])
            ->distinct()
            ->pluck('cate_id');
        return $result->toArray();
    }

//    public function getCategoriesFeature(array $ids = [])
//    {
////        return $this->with(['productsFeature'])
////            ->orderBy('id', 'DESC')
////            ->findWhereIn('id', $ids);
//    }
}
