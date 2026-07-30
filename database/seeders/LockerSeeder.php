<?php

namespace Database\Seeders;

use App\Models\Locker;
use Illuminate\Database\Seeder;

class LockerSeeder extends Seeder
{
    /**
     * 初期掲載用の座標情報。空き状況・参考価格はいずれも仮の初期値であり、
     * 実際の空き状況は投稿が集まるまで「報告なし」表示となる。
     */
    public function run(): void
    {
        $lockers = [
            ['station_name' => '静岡駅', 'name' => '在来線改札横 A', 'area_label' => '改札内/改札近く', 'walk_time' => '徒歩1分', 'lat' => 34.9718, 'lng' => 138.3889, 'price_s' => 400, 'price_m' => 600, 'price_l' => 800, 'notes' => null],
            ['station_name' => '静岡駅', 'name' => '北口地下道 B', 'area_label' => '北口・地下道', 'walk_time' => '徒歩3分', 'lat' => 34.9723, 'lng' => 138.3897, 'price_s' => 400, 'price_m' => 600, 'price_l' => 800, 'notes' => '雨に濡れずに行けます'],
            ['station_name' => '静岡駅', 'name' => '南口ホテル前 C', 'area_label' => '南口・ホテル側', 'walk_time' => '徒歩4分', 'lat' => 34.9701, 'lng' => 138.3901, 'price_s' => 400, 'price_m' => 600, 'price_l' => 800, 'notes' => null],
            ['station_name' => '静岡駅', 'name' => '観光案内所横 D', 'area_label' => '北口・地下道', 'walk_time' => '徒歩5分', 'lat' => 34.9727, 'lng' => 138.3883, 'price_s' => 400, 'price_m' => 600, 'price_l' => 800, 'notes' => null],
        ];

        foreach ($lockers as $locker) {
            Locker::firstOrCreate(
                ['station_name' => $locker['station_name'], 'name' => $locker['name']],
                $locker
            );
        }
    }
}
