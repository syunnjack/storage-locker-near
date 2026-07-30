<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'line_user_id',
        'locker_id',
        'last_checked_report_id',
    ];

    public function lineUser()
    {
        return $this->belongsTo(LineUser::class);
    }

    public function locker()
    {
        return $this->belongsTo(Locker::class);
    }
}
