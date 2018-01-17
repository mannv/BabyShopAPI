<?php

namespace App\Repositories;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Banner;

/**
 * Class BannerRepositoryEloquent
 * @package namespace App\Repositories;
 */
class BannerRepositoryEloquent extends MyRepositoryEloquent implements BannerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Banner::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
