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

        $row = [
            'id' => $model->id,
            'name' => $model->name,
            'old_price' => format_currency($model->old_price),
            'price' => format_currency($model->price),
            'percent' => $percent . '%',
            'thumbnail' => $thumbnail,
        ];
        if($model->cate_id != null) {
            $row['cate_id'] = $model->cate_id;
        }
        if($model->sold != null) {
            $row['sold'] = $model->sold;
        }
        return $row;
    }
}
