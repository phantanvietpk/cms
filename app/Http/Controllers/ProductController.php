<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
 
class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function show($slug)
    {
        $product = $this->productRepository->getViaSlug($slug, true);
        if (! $product) {
            abort(404);
        }
        $gallrery = $product->productAttributes->map(function ($item) {
            return $item->images;
        })->unique()->values()->toArray();
        $productAttributes = $product->productAttributes->toArray();

        $styles = $this->mappingProductAttributes($product->productAttributes, 'attribute_style'); 
        $sizes = $this->mappingProductAttributes($product->productAttributes, 'attribute_size'); 
        $colors = $this->mappingProductAttributes($product->productAttributes, 'attribute_color'); 

        return view('product.index', compact(
            'product','gallrery','productAttributes', 'styles', 'sizes', 'colors'
        ));   
    }

    protected function mappingProductAttributes($attributes, $property)
    {
        return $attributes->map(function ($item) use ($property) {
            return $item->getAttribute($property);
        })->unique()->values()->toArray();
    }
}
