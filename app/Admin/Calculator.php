<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Calculator extends Model
{
    
	protected $guarded  = [];


	public function SubscriberPackageName(){
		return $this->belongsTo("App\Admin\SubscriberPackageName");
	}
    
}
