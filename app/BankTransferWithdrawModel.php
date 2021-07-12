<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class BankTransferWithdrawModel extends Model
{
    protected $fillable = [
        'BankName',
        'accountName',
        'iban',
        'amount',
        'photo',
        'user_id',
        'relationship',
        'status',
        'reason'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
