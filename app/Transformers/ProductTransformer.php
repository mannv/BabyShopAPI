<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Product;

/**
 * Class ProductTransformer
 * @package namespace App\Transformers;
 */
class ProductTransformer extends TransformerAbstract
{

    /**
     * Transform the Product entity
     * @param App\Entities\Product $model
     *
     * @return array
     */
    public function transform(Product $model)
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'old_price' => $model->old_price,
            'price' => $model->price
        ];
    }
}
