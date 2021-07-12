<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ShippingCostWeight extends Model
{
    
	protected $guarded  = [];


	public function ShippingCost(){
		return $this->belongsTo("App\Admin\ShippingCost");
	}
    
}
