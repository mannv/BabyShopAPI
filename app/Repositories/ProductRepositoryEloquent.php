<?php

namespace App\Repositories;

use App\Criteria\CategoryCriteria;
use App\Criteria\CategoryProductCriteria;
use App\Criteria\FlashSaleCriteria;
use App\Presenters\ProductPresenter;
use App\Entities\Product;

/**
 * Class ProductRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ProductRepositoryEloquent extends MyRepositoryEloquent implements ProductRepository
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

    public function getFlashSaleOnMainScreen()
    {
        $this->pushCriteria(app(FlashSaleCriteria::class));
        $columns = [
            'id',
            'name',
            'old_price',
            'price',
            'sold'
        ];
        $limit = config('repository.pagination.limit', 10) * 2;
        return $this->with(['thumbnail'])->paginate($limit, $columns);
    }

    public function getProductIsSale()
    {
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

    public function productFeature(array $cateIds = [])
    {
        $columns = [
            'id',
            'name',
            'old_price',
            'price',
            'cate_id'
        ];
        $firstCate = array_shift($cateIds);
        $first = $this->model->where(['feature' => 1, 'cate_id' => $firstCate])->orderBy('id',
            'DESC')->select($columns)->limit(10);

        if (!empty($cateIds)) {
            foreach ($cateIds as $id) {
                $union = $this->model->where(['feature' => 1, 'cate_id' => $id])->orderBy('id',
                    'DESC')->select($columns)->limit(10);
                $first->union($union);
            }
        }
        return $first->get();
    }

    public function getProductDetail($id)
    {
        $this->skipPresenter(true);
        return $this->with(['category', 'images'])->find($id);
    }

    public function getListProductInIds(array $ids = [])
    {
        $columns = ['id', 'name', 'old_price', 'price'];
        return $this->with(['thumbnail'])
            ->orderBy(\DB::raw('FIELD(id, '. implode(',', $ids) .')'))
            ->findWhereIn('id', $ids, $columns);
    }
}
