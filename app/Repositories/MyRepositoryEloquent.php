<?php

namespace App\Repositories;

use League\Fractal\Manager;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use League\Fractal\Resource\Collection;

/**
 * Class BannerRepositoryEloquent
 * @package namespace App\Repositories;
 */
class MyRepositoryEloquent extends BaseRepository implements BannerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return '';
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function collectionTransformer($data = null, $transformer = null)
    {
        $resource = new Collection($data, $transformer);
        return (new Manager())->createData($resource)->toArray();
    }
}
