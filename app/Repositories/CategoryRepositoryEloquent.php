<?php

namespace App\Repositories;

use App\Presenters\CategoryPresenter;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Category;

/**
 * Class CategoryRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CategoryRepositoryEloquent extends MyRepositoryEloquent implements CategoryRepository
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

    public function getCategoriesByListCateIds(array $cateIds = [])
    {
        $this->setPresenter(app(CategoryPresenter::class));
        return $this->findWhereIn('id', $cateIds);
    }
}
