<?php

namespace App\Transformers;

use App\Entities\Product;
use League\Fractal\TransformerAbstract;
use App\Entities\ProductDetail;

/**
 * Class ProductDetailTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProductDetailTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['category', 'images'];

    /**
     * Transform the ProductDetail entity.
     *
     * @param \App\Entities\Product $model
     *
     * @return array
     */
    public function transform(Product $model)
    {
        $row = $model->toArray();
        $row['old_price'] = format_currency($row['old_price']);
        $row['price'] = format_currency($row['price']);
        return $row;
    }

    public function includeCategory(Product $model)
    {
        $category = $model->category;
        return $this->item($category, app(CategoryTransformer::class));
    }

    public function includeImages(Product $model)
    {
        return $this->collection($model->images, app(ProductImageTransformer::class));
    }
}
