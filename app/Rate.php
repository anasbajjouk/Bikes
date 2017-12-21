<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{

	protected $fillable = [
        'rate', 'product_id', 'widget_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
