<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ClientGroupBalance extends Model
{
    protected $guarded  = [];

    public function user(){
    	return $this->belongsTo("App\User", "client_or_group_id", "id");
    }

    public function SubscriberPackageName(){
    	return $this->belongsTo("App\Admin\SubscriberPackageName", "client_or_group_id", "id");
    }

    
}
