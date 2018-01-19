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
            'image' => product_image($model->image),
            'thumbnail' => $model->thumbnail
        ];
    }
}
