<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = [
        'product_id',
        'sku',
        'images',
        'attribute_color',
        'attribute_size',
        'attribute_style',
        'price',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id');
    }
}
