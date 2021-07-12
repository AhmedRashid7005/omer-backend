<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Review extends Model
{
    protected $fillable = [
        'operation_number',
        'user_id',
        'bill_number',
        'ontime',
        'covered',
        'identical',
        'recommend',
        'title',
        'content',
        'photos',
        'shareLinks',
        'share',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
