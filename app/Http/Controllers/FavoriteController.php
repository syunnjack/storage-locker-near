<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Locker;
use App\Models\AvailabilityReport;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle(Request $request, Locker $locker)
    {
        $lineUserLocalId = $request->session()->get('line_user_local_id');

        if (! $lineUserLocalId) {
            return redirect()->route('line.login', ['locker' => $locker->id]);
        }

        $favorite = Favorite::where('line_user_id', $lineUserLocalId)
            ->where('locker_id', $locker->id)
            ->first();

        if ($favorite) {
            $favorite->delete();

            return back()->with('success', '通知登録を解除しました。');
        }

        Favorite::create([
            'line_user_id' => $lineUserLocalId,
            'locker_id' => $locker->id,
            'last_checked_report_id' => AvailabilityReport::where('locker_id', $locker->id)->max('id') ?? 0,
        ]);

        return back()->with('success', '空きありの報告が投稿されるとLINEでお知らせします。');
    }
}
