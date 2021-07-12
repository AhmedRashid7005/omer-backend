<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = "contact_uses";

    protected $guarded  = [];

    public function contactUsReplies() {

        return $this->hasMany('App\Admin\ContactUsReply');
    }
}
