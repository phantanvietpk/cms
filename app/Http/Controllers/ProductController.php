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
        return view('product.index',compact('product','gallrery'));   
    }   
}
