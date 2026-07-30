<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvailabilityReport extends Model
{
    protected $fillable = [
        'locker_id',
        'size',
        'status',
        'comment',
        'nickname',
        'ip_hash',
    ];

    public function locker()
    {
        return $this->belongsTo(Locker::class);
    }
}
