<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ImageVideoService extends Model
{
    protected $guarded  = [];

    public function subscriberPackageName(){
        return $this->belongsTo("App\Admin\SubscriberPackageName");
    }
}
