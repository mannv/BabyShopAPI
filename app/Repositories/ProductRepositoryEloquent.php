<?php

namespace App\Repositories;

use App\Criteria\CategoryCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Entities\Product;

/**
 * Class ProductRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(CategoryCriteria::class));
    }

    public function getProductsByCategoryId()
    {
        $columns = [
            'id',
            'name',
            'old_price',
            'price'
        ];
        return $this->with(['thumbnail'])->paginate(null, $columns);
    }


}
