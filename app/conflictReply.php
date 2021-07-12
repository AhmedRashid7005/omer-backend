<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Conflict;
class conflictReply extends Model
{
    protected $fillable = [
        'owner_id',
        'owner_role',
        'response',
        'photos',
        'conflict_id',
    ];

    public function conflict()
    {
        return $this->belongsTo(Conflict::class);
    }
}
