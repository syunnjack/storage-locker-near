<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'locker_id',
        'nickname',
        'rating',
        'comment',
        'photo_path',
        'ip_hash',
    ];

    public function locker()
    {
        return $this->belongsTo(Locker::class);
    }
}
