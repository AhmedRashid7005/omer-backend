<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class SubscriberPackageName extends Model
{
    protected $guarded  = [];

    public function user(){
    	return $this->hasOne("App\User");
    }

    public function imageVideoService(){
    	return $this->hasOne("App\Admin\ImageVideoService");
    }

    public function otherService(){
    	return $this->hasOne("App\Admin\OtherService");
    }

    public function ClientGroupBalance(){
        return $this->hasOne("App\Admin\ClientGroupBalance");
    }

    public function ShippingCost(){
        return $this->hasOne("App\Admin\ShippingCost");
    }

    public function ShippingCostWeight(){
        return $this->hasOne("App\Admin\ShippingCostWeight");
    }

   public function Calculator(){
       return $this->hasOne("App\Admin\Calculator");
   }


   public function AdvancePayment(){
       return $this->hasOne("App\Admin\AdvancePayment");
   } 

    
}
