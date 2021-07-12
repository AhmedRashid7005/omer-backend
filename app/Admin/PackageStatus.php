<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class PackageStatus extends Model
{
    protected $guarded  = [];

    public function package(){

    	return $this->hasOne("App\Admin\Package");
    }

}
