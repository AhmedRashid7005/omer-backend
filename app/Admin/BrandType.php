<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class BrandType extends Model
{
    protected $guarded  = [];

    public function brand(){

    	return $this->hasOne("App\Admin\Brand");
    }
}
