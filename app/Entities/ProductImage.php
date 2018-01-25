<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProductImage extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;
    protected $table = 'product_images';
    protected $fillable = [
        'image',
        'product_id',
        'thumbnail'
    ];

}
