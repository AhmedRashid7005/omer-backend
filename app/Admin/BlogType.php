<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class BlogType extends Model
{
   protected $guarded  = [];

   public function blog(){

   	return $this->hasOne("App\Admin\Blog");
   }
}
