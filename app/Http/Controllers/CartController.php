<?php

namespace App\Http\Controllers;

use App\Product;
use App\Widget;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CartController extends Controller
{
  
    public function index()
    {
        $cartItems = Cart::instance('shopping')->content();
        return view('cart.index', compact('cartItems'));
    }

    public function wishlist()
    {
        $cartItems = Cart::instance('wishlist')->content();
        return view('cart.wishlist', compact('cartItems'));
    }

    public function addProductItem(Request $request , $id){

        $qty = $request->input('quantity');
        $color = $request->input('color');

        $product = Product::find($id);

        if ($request->has('cart')) {

            Cart::instance('shopping')->add($id, $product->name, $qty , $product->price, [
                    'color' => $color,
                    'image' =>  $product->image,
                    'type' => 'p' ]);

            return redirect()->route('cart.index');

        } elseif ($request->has('wishlist')) {

            Cart::instance('wishlist')->add($id, $product->name, $qty , $product->price, [
                                                'color' => $color,
                                                'image' =>  $product->image,
                                                'type' => 'p' ]);

            return redirect()->route('cart.wishlist');

        }


    }

    public function addWidgetItem(Request $request , $id){

        $qty = $request->input('quantity');
        $color = $request->input('color');

        $widget = Widget::find($id);

        if ($request->has('cart')) {

            Cart::instance('shopping')->add($id, $widget->name, $qty , $widget->price, [
                    'color' => $color,
                    'image' =>  $widget->image,
                    'type' => 'w' ]);

            return redirect()->route('cart.index');

        } elseif ($request->has('wishlist')) {

            Cart::instance('wishlist')->add($id, $widget->name, $qty , $widget->price, [
                                                'color' => $color,
                                                'image' =>  $widget->image,
                                                'type' => 'w' ]);
            
            return redirect()->route('cart.wishlist');

        }

    }

    public function update(Request $request, $id)
    {

        Cart::instance('shopping')->update( $id, ['qty' => $request->qty] );

        return back();
    }

   
    public function destroy(Request $request, $id)
    {   

        if ($request->has('cart')) {

            Cart::instance('shopping')->remove($id);

        } elseif ($request->has('wishlist')) {

            Cart::instance('wishlist')->remove($id);

        }

        return back();
    }

}



