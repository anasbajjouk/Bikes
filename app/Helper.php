<?php

namespace App;

use App\Product;
use App\Widget;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Helper extends Eloquent
{
    
    public static function scopeSearchByBrand($query, $brand)
    {
        return $query->where('brand', $brand);
    }

    public static function scopeSearchByName($query, $name)
    {
        return $query->where('name', 'LIKE' , "%".$name."%");
    }

    public static function scopePriceFilter($query, $min_price, $max_price)
    {
        return $query->whereBetween('price', [$min_price, $max_price]);
    }

    public static function scopePaginateFilter($query, $number_item, $orderby)
    {
        return $query->orderBy('updated_at', $orderby)
                        ->paginate($number_item);
    }

   /* public static function scopeSearchByCategory($query, $category)
    {
        return $query->where('category_id', $category);
    }*/

}
