<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $guarded  = [];

    public function images() {	
        return $this->hasMany('App\Admin\Image', "content_id", "id");
    }

    public function order(){
    	return $this->belongsTo("App\Admin\Order");
    }

    public function orderProductOffer(){

    	return $this->hasOne("App\Admin\OrderProductOffer");
    }

}
