<?php

namespace App\Repositories;

use App\Criteria\CategoryCriteria;
use App\Criteria\CategoryProductCriteria;
use App\Criteria\FlashSaleCriteria;
use App\Presenters\ProductPresenter;
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
        $this->setPresenter(app(ProductPresenter::class));
    }

    public function getProductsByCategoryId()
    {
        $this->pushCriteria(app(CategoryProductCriteria::class));
        $columns = [
            'id',
            'name',
            'old_price',
            'price'
        ];
        return $this->with(['thumbnail'])->paginate(null, $columns);
    }

    public function getFlashSaleOnMainScreen() {
        $this->pushCriteria(app(FlashSaleCriteria::class));
        $columns = [
            'id',
            'name',
            'old_price',
            'price',
            'sold'
        ];
        return $this->with(['thumbnail'])->paginate(null, $columns);
    }
}
