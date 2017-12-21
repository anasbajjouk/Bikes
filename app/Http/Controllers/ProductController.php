<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductRequest;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /* 
        PRODUCT CONTROLLER ARE WORKING ON THE ADMIN PANEL ONLY .
        FRONT CONTROLLER IS MADE FOR ALL THE FRONT VIEWS 
    */
    public function adminIndex(){
        $orders = Order::count();
        $users = User::count();
        $rate = Order::all()->sum('total');
        //dd($orders);
        return view('admin.index', compact('orders', 'users', 'rate'));
    }

    public function index() {
        $products = Product::paginate(10);
        $i= 1;
        return view('admin.product.index', compact('products','i'));
    }

    
    public function create() {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(ProductRequest $request) {   

        //Upload Image
        $image = $request->image;

        if ($image) {
            $imageName = Auth::user()->name . '-' . $image->getClientOriginalName();
            $imageFile = $image->move('product_img', $imageName);
        

            $colorString = implode(", ", $request->get('color'));
            $sizeString = implode(", ", $request->get('size'));

            Product::create([
                        'name' => $request->get('name'),
                        'brand' => $request->get('brand'),
                        'description' => $request->get('description'),
                        'category_id' => $request->get('category_id'),
                        'overview' => $request->get('overview'),
                        'price' => $request->get('price'),
                        'size' => $sizeString, //$request->get('size'),
                        'discount' => $request->get('discount'),
                        'availability' => $request->get('availability'),
                        'onSale' => $request->get('onSale'),
                        'information' => $request->get('information'),
                        'color' => $colorString,//$request->get('color'),
                        'image' => $imageFile
                    ]);

            return redirect()->route('product.index')->with('success', 'Product has been added successfully.');
        }
        return redirect()->route('product.index')->with('errors', 'Something went wrong');
    }

   
    public function show(Product $product) {

        $product = Product::find($product->id);
        return view('admin.product.show', compact('product'));
    }

  
    public function edit(Product $product) {

        $products = Product::find($product->id);

        $proCatID = $products->category_id;
        $proCatName = Category::where('id', $proCatID)->value('name');

        $categories = Category::all();
        return view('admin.product.edit', compact('products', 'categories', 'proCatName'));
    }

  
    public function update(ProductRequest $request, Product $product) {

        $products = Product::findOrFail($product->id);

        $colorString = implode(", ", $request->get('color'));
        $sizeString = implode(", ", $request->get('size'));

        //Upload Image
        $image = $request->image;

        if ($image) {
            $imageName = $image->getClientOriginalName(). '-' . $product->id;
            $imageFile = $image->move('product_img', $imageName);

        }else if (!$image){
            $imageFile = $products->image;
        }
            
        if ($products) {

           $products->update([
                'name' => $request->get('name'),
                'brand' => $request->get('brand'),
                'description' => $request->get('description'),
                'category_id' => $request->get('category_id'),
                'overview' => $request->get('overview'),
                'price' => $request->get('price'),
                'size' => $sizeString, //$request->get('size'),
                'discount' => $request->get('discount'),
                'availability' => $request->get('availability'),
                'onSale' => $request->get('onSale'),
                'information' => $request->get('information'),
                'color' => $colorString,//$request->get('color'),
                'image' => $imageFile
            ]);

            return redirect()->route('product.index')->with('success', 'Product has been added successfully.');
        }
        return redirect()->route('product.index')->with('errors', 'Something went wrong');
    }

    public function destroy(Product $product) {
        $products = Product::findOrFail($product->id);
        $products->delete(); 
        return back()->with('success', 'Product Has Been Deleted Successfully.');
    }

}
