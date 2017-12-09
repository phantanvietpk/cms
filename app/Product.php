<?php

namespace App;

use App\Http\Filters\HasFilters;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFilters;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'content',
        'sku',
        'images',
        'status',
        'slug'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public $timestamps = false;
    
    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id');
    }

    public function getLinkAttribute()
    {
        return route('product.show', $this->getAttribute('slug'));
    }
    
}
