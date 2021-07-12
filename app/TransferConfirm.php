<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferConfirm extends Model
{
    protected $fillable = [
        'operation_number',
        'account_owner_name',
        'bank_name',
        'account_number',
        'amount',
        'confirmAmount',
        'purpose' ,
        'date',
        'photo',
        'user_id',
        'status'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
