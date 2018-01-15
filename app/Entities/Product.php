<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'cate_id',
        'flash_sale',
        'old_price',
        'price',
        'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category() {
        return $this->hasOne(Category::class, 'id', 'cate_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images() {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    /**
     * @return $this
     */
    public function thumbnail() {
        return $this->hasOne(ProductImage::class, 'product_id', 'id')->where(['thumbnail' => 1]);
    }

}
