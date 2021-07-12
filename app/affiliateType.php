<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class affiliateType extends Model
{
    use SoftDeletes;
    protected $guarded  = [];
    protected $dates = ['deleted_at'];

    public function affiliateGroup() {
        return $this->hasMany('App\affiliateGroup');
    }
}
