<?php
namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class ProductRepository
{
    protected $products;

    public function __construct(Product $product)
    {
        $this->products = $product;
    }

    public function query()
    {
        return $this->products->query();
    }

    public function getViaSlug($slug, $status = false)
    {
        $product = $this->products->where([
            [
                'slug',
                '=',
                $slug
            ]
        ])->with('productAttributes');
        $product = $product->firstOrFail();
        return $product;
    }

    public function getProductAttributes($id,$attributes)
    {
        $product = $this->products->where('id',$id)->first();
        $product = $product->productAttributes->map(function ($item) use ($attributes) {
            return $item->$attributes;
        })->unique()->values()->toArray();
        return $product;
    }
}