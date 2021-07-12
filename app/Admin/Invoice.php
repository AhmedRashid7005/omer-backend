<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded  = [];

    public function order(){

    	return $this->belongsTo("App\Admin\Order", "order_no", "order_no");
    }
}
