<?php

namespace App\Console\Commands;

use App\Models\Favorite;
use App\Models\AvailabilityReport;
use App\Support\LineMessaging;
use Illuminate\Console\Command;

class CheckAvailabilityWatches extends Command
{
    protected $signature = 'availability:check-watches';

    protected $description = 'お気に入り登録されたロッカーに「空きあり」の報告が新しく投稿されていないか確認し、LINEで通知する';

    public function handle(): int
    {
        $favorites = Favorite::with('lineUser')->get();

        foreach ($favorites as $favorite) {
            if (! $favorite->lineUser) {
                continue;
            }

            $since = $favorite->last_checked_report_id ?? 0;
            $newReports = AvailabilityReport::where('locker_id', $favorite->locker_id)
                ->where('id', '>', $since)
                ->get();

            if ($newReports->isEmpty()) {
                continue;
            }

            // 「残りわずか」「満」の報告では通知しない。空きが出た時だけ通知するのが本サイトの価値。
            $availableReports = $newReports->where('status', 'あり');

            if ($availableReports->isNotEmpty()) {
                $latest = $availableReports->sortByDesc('id')->first();
                $favorite->loadMissing('locker');
                LineMessaging::push(
                    $favorite->lineUser->line_user_id,
                    "「{$favorite->locker->name}」で空きありの報告がありました（{$latest->size}サイズ）。お早めにご確認ください。"
                );
            }

            // last_checked_report_idは検知カーソル。idは常に厳密単調増加のため、
            // created_at(秒精度)を使った場合に起こりうる同一秒内の複数投稿の取りこぼしが起きない。
            $favorite->update(['last_checked_report_id' => $newReports->max('id')]);
        }

        return self::SUCCESS;
    }
}
