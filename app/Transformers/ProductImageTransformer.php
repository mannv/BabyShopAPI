<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ProductImage;

/**
 * Class ProductImageTransformer
 * @package namespace App\Transformers;
 */
class ProductImageTransformer extends TransformerAbstract
{

    /**
     * Transform the ProductImage entity
     * @param App\Entities\ProductImage $model
     *
     * @return array
     */
    public function transform(ProductImage $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
