<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded  = [];

    public function brandType(){
    	return $this->belongsTo("App\Admin\BrandType");
    }

    public function images() {

        return $this->hasMany('App\Admin\Image', "content_id", "id");
    }
}
