<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded  = [];

    public function images() {
    	
        return $this->hasMany('App\Admin\Image', "content_id", "id");
    }

    public function blogType(){
    	return $this->belongsTo("App\Admin\BlogType");
    }

}
