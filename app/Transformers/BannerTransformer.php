<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Banner;

/**
 * Class BannerTransformer
 * @package namespace App\Transformers;
 */
class BannerTransformer extends TransformerAbstract
{

    /**
     * Transform the Banner entity
     * @param App\Entities\Banner $model
     *
     * @return array
     */
    public function transform(Banner $model)
    {
        return [
            'name' => $model->name,
            'image' => $model->image,
            'url' => $model->url
        ];
    }
}
