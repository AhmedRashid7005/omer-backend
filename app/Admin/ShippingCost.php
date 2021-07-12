<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ShippingCost extends Model
{
    protected $guarded  = [];


    public function SubscriberPackageName(){
    	return $this->belongsTo("App\Admin\SubscriberPackageName");
    }

    public function ShippingCostWeight(){
    	return $this->hasMany("App\Admin\ShippingCostWeight");
    }
    
}
