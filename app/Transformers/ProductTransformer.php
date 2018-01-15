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

        $percent = 0;
        if($model->old_price > 0) {
            $percent = 100 - round(($model->price / $model->old_price) * 100);
        }
        $thumbnail = '';
        if(isset($model->thumbnail)) {
            $thumbnail = $model->thumbnail->image;
        }
        return [
            'id' => $model->id,
            'name' => $model->name,
            'old_price' => $model->old_price,
            'price' => $model->price,
            'percent' => $percent . '%',
            'thumbnail' => $thumbnail,
        ];
    }
}
