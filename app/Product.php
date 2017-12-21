<?php

namespace App;

use App\Helper;
use App\Product;
//use Illuminate\Database\Eloquent\Model;

class Product extends Helper
{
    protected $fillable = [
        'name','description','size','category_id','image','price','overview','color','information','brand','discount','onSale','availability',
    ];

    public static function scopeSearchByCategory($query, $category)
    {
        return $query->where('category_id', $category);
    }
    
    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function productItems(){
        return $this->belongsToMany(Order::class)->withPivot('qty','total');
    }

    public function wishItems(){
        return $this->belongsToMany(Wishlist::class);
    }

    public function rates(){
        return $this->hasMany(Rate::class);
    }



}
