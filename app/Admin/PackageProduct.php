<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class PackageProduct extends Model
{
    protected $guarded  = [];

    public function package(){

    	return $this->belongsTo("App\Admin\Package");
    }
}
