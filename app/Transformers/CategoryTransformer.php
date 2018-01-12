<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Category;

/**
 * Class CategoryTransformer
 * @package namespace App\Transformers;
 */
class CategoryTransformer extends TransformerAbstract
{

    /**
     * Transform the Category entity
     * @param App\Entities\Category $model
     *
     * @return array
     */
    public function transform(Category $model)
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'icon' => $model->icon
        ];
    }
}
