<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\PackageNote;
class Package extends Model
{
    protected $guarded  = [];

    public function images() {
    	
        return $this->hasMany('App\Admin\Image', "content_id", "id");
    }

    public function packageStatus(){
    	return $this->belongsTo("App\Admin\PackageStatus");
    }

    public function user(){
    	return $this->belongsTo("App\User")->withDefault([
            'name' => 'Client not existed'
        ]);
    }

    public function packageProducts(){
        return $this->hasMany("App\Admin\PackageProduct");
    }

    public function PackageNotes()
    {
        return $this->hasMany(PackageNote::class);
    }


}
