<?php

namespace App\Criteria;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ProductSearchCriteria.
 *
 * @package namespace App\Criteria;
 */
class ProductSearchCriteria implements CriteriaInterface
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Apply criteria in query repository
     *
     * @param string $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $name = $this->request->get('name', '');
        if (!empty($name)) {
            $model = $model->where('name', 'like', '%' . $name . '%');
        }
        return $model;
    }
}
