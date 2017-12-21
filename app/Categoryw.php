<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoryw extends Model
{
    protected $fillable = ['name'];
	
    public function widgets(){
    	return $this->hasMany(Widget::class, 'categoryw_id', 'id');
    }
}
