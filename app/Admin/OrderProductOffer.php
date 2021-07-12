<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class OrderProductOffer extends Model
{
    protected $guarded  = [];

    public function orderProduct(){
    	return $this->belongsTo("App\Admin\OrderProduct");
    }
    
}
