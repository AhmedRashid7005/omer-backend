<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class WebsiteDevelopmentReply extends Model
{
    protected $guarded  = [];

    public function websiteDevelopment(){
         return $this->belongsTo('App\Admin\WebsiteDevelopment');
    }
}
