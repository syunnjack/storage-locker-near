<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    protected $fillable = [
        'station_name',
        'name',
        'area_label',
        'walk_time',
        'lat',
        'lng',
        'price_s',
        'price_m',
        'price_l',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'lat' => 'float',
            'lng' => 'float',
        ];
    }

    public function availabilityReports()
    {
        return $this->hasMany(AvailabilityReport::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function latestStatusBySize(): array
    {
        $latest = $this->availabilityReports->sortByDesc('id')->unique('size');

        return collect(['S', 'M', 'L'])->mapWithKeys(fn ($size) => [
            $size => $latest->firstWhere('size', $size),
        ])->all();
    }
}
