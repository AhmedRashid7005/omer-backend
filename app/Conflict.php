<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\conflictReply;
use App\User;

class Conflict extends Model
{
    protected $fillable = [
        'subject',
        'conflict_number',
        'conflict_d',
        'status',
        'description',
        'customer_sol',
        'suit',
        'photos',
        'user_id'
    ];

    public function conflictReplys()
    {
        return $this->hasMany(conflictReply::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
