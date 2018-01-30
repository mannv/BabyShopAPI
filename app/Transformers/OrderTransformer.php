<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Order;

/**
 * Class OrderTransformer.
 *
 * @package namespace App\Transformers;
 */
class OrderTransformer extends TransformerAbstract
{
    /**
     * Transform the Order entity.
     *
     * @param \App\Entities\Order $model
     *
     * @return array
     */
    public function transform(Order $model)
    {
        return $model->toArray();
    }
}
