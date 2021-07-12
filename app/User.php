<?php

namespace App;
use Tymon\JWTAuth\Contracts\JWTSubject;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Conflict;
use App\Review;
use App\TransferConfirm;
use App\Balance;
use App\BankTransferWithdrawModel;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded  = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function subscriberPackageName(){
        return $this->belongsTo("App\Admin\SubscriberPackageName");
    }

    public function package(){

        return $this->hasMany("App\Admin\Package");
    }

    public function order(){

        return $this->hasOne("App\Admin\Order");
    }

    public function conflicts()
    {
        return $this->hasMany(Conflict::class);
    }

    public function ClientGroupBalance(){
        
        return $this->belongsTo("App\Admin\ClientGroupBalance");
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }




    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function review()
    {
        return $this->hasOne(User::class);
    }

    public function confirmTransfers()
    {
        return $this->hasMany(TransferConfirm::class);
    }

    public function Balance()
    {
        return $this->hasOne(Balance::class);
    }

    public function bankTransfers()
    {
        return $this->hasMany(BankTransferWithdrawModel::class);
    }
}
