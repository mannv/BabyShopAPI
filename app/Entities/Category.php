<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Category extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'icon',
        'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products() {
        return $this->hasMany(Product::class, 'cate_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productsFeature() {
        return $this->hasMany(Product::class, 'cate_id', 'id')->where(['feature' => 1])->orderBy('id', 'DESC')->limit(10);
    }
}
