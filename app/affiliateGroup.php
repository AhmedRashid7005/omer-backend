<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class affiliateGroup extends Model
{
    use SoftDeletes;
    protected $guarded  = [];
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    public function affiliateType(){
         return $this->belongsTo('App\affiliateType');
    }
}
