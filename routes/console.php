<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// 荷物を持って駅にいる利用者は「今すぐ」空き状況を知りたいため、日次バッチではなく高頻度で確認する。
Schedule::command('availability:check-watches')->everyFiveMinutes();
