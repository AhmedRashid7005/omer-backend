<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteDevelopment extends Model
{
    protected $guarded = [];

    public function websiteDevelopmentReplies() {

        return $this->hasMany('App\Admin\WebsiteDevelopmentReply');
    }
}
