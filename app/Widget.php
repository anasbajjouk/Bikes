<?php

namespace App;

use App\Helper;

//use Illuminate\Database\Eloquent\Model;

class Widget extends Helper
{
    protected $fillable = [
        'name','description','size','categoryw_id','image','price','overview','color','information','brand','discount','onSale','availability',
    ];

    public static function scopeSearchByCategory($query, $category)
    {
        return $query->where('categoryw_id', $category);
    }

    public function widgcategory(){
    	return $this->belongsTo(Categoryw::class, 'categoryw_id');
    }

    public function rates(){
        return $this->hasMany(Rate::class);
    }

    public function widgetItems(){
        return $this->belongsToMany(Order::class)->withPivot('qty','total');
    }

    public function wishItems(){
        return $this->belongsToMany(Wishlist::class);
    }
}
