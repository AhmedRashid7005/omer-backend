<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded  = [];

    public function brand(){
         return $this->belongsTo('App\Admin\Brand');
    }

    public function blog(){
         return $this->belongsTo('App\Admin\Blog');
    }

    public function package(){
         return $this->belongsTo('App\Admin\Package');
    }

    public function orderProduct(){
         return $this->belongsTo('App\Admin\OrderProduct');
    }

}
