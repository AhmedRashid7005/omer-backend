<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ContactUsReply extends Model
{
    protected $guarded  = [];

    public function contactUs(){
         return $this->belongsTo('App\Admin\ContactUs');
    }
}
