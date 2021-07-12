<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Balance extends Model
{
    protected $fillable=[
        'Available',
        'Required',
        'Withdraw',
        'Pending',
        'Receivable',
        'Used',
        'Points',
        'user_id'
    ];

    public function user()
    { 
        return $this->belongsTo(User::class);
    }
}
