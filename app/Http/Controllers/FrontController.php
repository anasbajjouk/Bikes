<?php

namespace App\Http\Controllers;

use App\Category;
use App\Categoryw;
use App\Http\Controllers\SearchController;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessage;
use App\Product;
use App\Widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    /* 
        PRODUCT CONTROLLER ARE WORKING ON THE ADMIN PANEL ONLY .
        FRONT CONTROLLER IS MADE FOR ALL THE FRONT VIEWS 
    */
    public function home()
    {
        $products = Product::all()->random(8);
        $widgets = Widget::all()->random(8);
       
        return view('front.index', compact('products','widgets','products_cat','widgets_cat'));
    }

    public function productShop(Request $request)
    {

        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');

        $brand =  $request->input('brand');
        $number_item = $request->get('number_item') ? $request->get('number_item'): 12;
        $orderby = $request->get('orderby')?: 'desc';
        $category = $request->input('category');

        $products = SearchController::searchProducts($min_price, $max_price, 
                                                        $brand, $category, $number_item, $orderby);

        $categories = Category::all();

        $randomProducts = Product::all()->random(5);

        return view('front.productShop', compact('products', 'categories','min_price','max_price', 'brand', 'number_item', 'orderby' , 'randomProducts'));
      
        
    }

    public function widgetShop(Request $request)
    {

        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $brand =  $request->input('brand');
        $number_item = $request->get('number_item') ? $request->get('number_item'): 12;
        $orderby = $request->get('orderby')?: 'desc';
        $category = $request->input('category');

        $widgets = SearchController::searchWidgets($min_price, $max_price, 
                                                        $brand, $category, $number_item, $orderby);

        $categories = Categoryw::all();

        $randomWidgets = Widget::all()->random(5);
        
        return view('front.widgetShop', compact('widgets', 'categories','min_price','max_price', 'brand', 'number_item', 'orderby' , 'randomWidgets'));
    }

    public function search(Request $request)
    {

        $category = $request->input('category');
        $name = $request->input('search');
        $orderby = $request->get('orderby')?: 'desc';
        $number_item = $request->get('number_item') ? $request->get('number_item'): 12;

        $search = SearchController::basicSearch($category , $name, $number_item, $orderby);
        
        return view('front.search', compact('search','name','category','orderby','number_item'));
    }

    public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        $widgets = Widget::all()->random(6);
        
        $totalRate = $product->rates()
                                ->where('product_id', $product->id)
                                ->sum('rate');
        $countUsers = $product->rates()
                                ->where('product_id', $product->id)
                                ->count('user_id');

        
        if( ($countUsers == 0) || ($totalRate == 0) ){
            $overallRate = 1;
            $countUsers = 0;
            $totalRate = 1;
        }else{
            $overallRate = $totalRate/$countUsers;
        }

        $productItems = $product->productItems()->get(); // OrderProduct TABLE
        $rates = $product->rates()->get(); // Rate Table
        
        foreach ($rates as $rate) { // Rate table
            $itemRate = $rate->product_id; // product_id
            $userRate = $rate->user_id; // user_id
            $rateValue = $rate->rate; // Rate value
        }

        foreach ($productItems as $productItem) { // Order Product Table 
            $pivotProductID = $productItem->pivot->product_id; //Product_id 
            $pivotUserID = $productItem->user_id;   // User_id
        }

        return view('front.productDetail', compact('product', 'widgets', 'pivotProductID', 'pivotUserID','itemRate', 'userRate','rateValue', 'overallRate', 'countUsers'));
    }

    public function showWidget($id)
    {
        $widget = Widget::findOrFail($id);
        $products = Product::all()->random(6);

        $totalRate = $widget->rates()
                            ->where('widget_id', $widget->id)
                            ->sum('rate');
        $countUsers = $widget->rates()
                            ->where('widget_id', $widget->id)
                            ->count('user_id');

        
        if( ($countUsers == 0) || ($totalRate == 0) ){
            $overallRate = 1;
            $countUsers = 0;
            $totalRate = 1;
        }else{
            $overallRate = $totalRate/$countUsers;
        }

        $widgetItems = $widget->widgetItems()->get();

        $rates = $widget->rates()->get();
        
        foreach ($rates as $rate) { // Rate table
            $itemRate = $rate->widget_id; // widget_id
            $userRate = $rate->user_id; // user_id
            $rateValue = $rate->rate; // Rate value
        }

        foreach ($widgetItems as $widgetItem) {
            $pivotWidgetID = $widgetItem->pivot->widget_id;
            $pivotUserID = $widgetItem->user_id;
        }

        return view('front.widgetDetail', compact('widget','products', 'pivotWidgetID', 'pivotUserID','itemRate', 'userRate','rateValue', 'overallRate', 'countUsers'));
    }

    public function contact(ContactRequest $request)
    {


       Mail::to('info@bikesport.com', $request->email)
                                    ->send( new ContactMessage($request) );

       return redirect()->back()
                        ->with('success', 'Message Has been Sent Successfully .');

    }
 
}
