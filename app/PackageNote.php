<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Package;
class PackageNote extends Model
{
    protected $fillable = ['package_id', 'user_id', 'notes', "type"];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}