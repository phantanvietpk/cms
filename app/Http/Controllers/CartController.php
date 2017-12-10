<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductAttribute;
use Cart;

class CartController extends Controller
{
    public function addCart(Request $request,ProductAttribute $productAttribute)
    {
        if(!$request->has('product_id'))
        {
            return back();
        }
        $product = $productAttribute->where('id',$request->product_id)->first();
        Cart::add([
            'id' => $product->id, 
            'name' => $product->product->name,
            'qty' => $request->quantity, 
            'price' => $product->price, 
            'options' => [
                'product' => $product->product,
                'attribute' => $product,
            ],
        ]);
        
        flash('"'.$product->product->name.'" has been added to your cart..', 'success');        
        return back();
    }

    public function view()
    {
        $cart = Cart::content();
        return view('cart.list',compact('cart'));
    }
}
