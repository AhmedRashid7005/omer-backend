<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class OtherService extends Model
{
    protected $guarded  = [];

    public function subscriberPackageName(){
        return $this->belongsTo("App\Admin\SubscriberPackageName");
    }
    
}
