<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded  = [];

    public function orderProduct(){

    	return $this->hasMany("App\Admin\OrderProduct");
    }

    public function user(){
    	return $this->belongsTo("App\User");
    }

    public function invoice(){

    	return $this->hasOne("App\Invoice", "order_no", "order_no");
    }
    
}
