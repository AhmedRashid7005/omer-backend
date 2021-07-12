<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    
	protected $guarded  = [];

    public function admin() {

        return $this->hasOne('App\Admin\Admin');
    }
}
