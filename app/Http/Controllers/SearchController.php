<?php

namespace App\Http\Controllers;

use App\Product;
use App\Widget;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    

    public static function searchProducts($min_price, $max_price, $brand, $category, $number_item, $orderby)
    {
    	if ( isset($min_price) && isset($max_price) && isset($brand) && isset($category) ) {

            $products = Product::SearchByBrand($brand)
                                ->SearchByCategory($category)
                                ->PriceFilter($min_price,$max_price)
                                ->PaginateFilter($number_item, $orderby);
        }

        else if ( isset($min_price) && isset($max_price) && isset($brand) ) {

            $products = Product::SearchByBrand($brand)
                                ->PriceFilter($min_price,$max_price)
                                ->PaginateFilter($number_item, $orderby);
        }

        else if ( isset($min_price) && isset($max_price) ) {

            $products = Product::PriceFilter($min_price,$max_price)
                                ->PaginateFilter($number_item, $orderby);
        }

        else if ( isset($category) ){

            $products = Product::SearchByCategory($category)
                                ->PaginateFilter($number_item, $orderby);

        }

        else if ( isset($brand) ){

            $products = Product::SearchByBrand($brand)
                                ->PaginateFilter($number_item, $orderby);

        }

        else{

            $products = Product::PaginateFilter($number_item, $orderby);
        }

        return $products;
    }

    public static function searchWidgets($min_price, $max_price, $brand, $category, $number_item, $orderby)
    {
    	if ( isset($min_price) && isset($max_price) && isset($brand) && isset($category) ) {

            $widgets = Widget::SearchByBrand($brand)
                                ->SearchByCategory($category)
                                ->PriceFilter($min_price,$max_price)
                                ->PaginateFilter($number_item, $orderby);
        }

        else if ( isset($min_price) && isset($max_price) && isset($brand) ) {

            $widgets = Widget::SearchByBrand($brand)
                                ->PriceFilter($min_price,$max_price)
                                ->PaginateFilter($number_item, $orderby);
        }

        else if ( isset($min_price) && isset($max_price) ) {

            $widgets = Widget::PriceFilter($min_price,$max_price)
                                ->PaginateFilter($number_item, $orderby);
        }

        else if ( isset($category) ){

            $widgets = Widget::SearchByCategory($category)
                                ->PaginateFilter($number_item, $orderby);

        }

        else if ( isset($brand) ){

            $widgets = Widget::SearchByBrand($brand)
                                ->PaginateFilter($number_item, $orderby);

        }

        else{

            $widgets = Widget::PaginateFilter($number_item, $orderby);
        }

        return $widgets;
    }

    public static function basicSearch($category, $name, $number_item, $orderby){

        if ( isset($category) && ($category == 'product') && isset($name)){

            $search = Product::SearchByName($name)
                                ->PaginateFilter($number_item, $orderby);


        }else if (isset($category) && ($category== 'widget') && isset($name)) {
            
            $search = Widget::SearchByName($name)
                                ->PaginateFilter($number_item, $orderby);

        }

        elseif (isset($category) && ($category == 'product')){
            $search = Product::PaginateFilter($number_item, $orderby);
        }

        elseif (isset($category) && ($category == 'widget')){
            $search = Widget::PaginateFilter($number_item, $orderby);
        }
        
        return $search;
    }

}
