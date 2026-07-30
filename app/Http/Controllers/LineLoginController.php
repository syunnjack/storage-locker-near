<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\LineUser;
use App\Models\AvailabilityReport;
use App\Models\Locker;
use App\Support\LineMessaging;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LineLoginController extends Controller
{
    public function redirect(Request $request)
    {
        $state = Str::random(40);
        $request->session()->put('line_login_state', $state);

        if ($request->filled('locker')) {
            $request->session()->put('line_login_intended_locker', (int) $request->input('locker'));
        }

        return redirect()->away(LineMessaging::authorizeUrl($state));
    }

    public function callback(Request $request)
    {
        $state = $request->query('state');
        $expectedState = $request->session()->pull('line_login_state');

        if (! $state || $state !== $expectedState) {
            return redirect()->route('lockers.index')->withErrors(['line' => 'LINEログインの検証に失敗しました。もう一度お試しください。']);
        }

        if (! $request->filled('code')) {
            return redirect()->route('lockers.index')->withErrors(['line' => 'LINEログインがキャンセルされました。']);
        }

        $token = LineMessaging::exchangeToken($request->input('code'));
        $claims = LineMessaging::verifyIdToken($token['id_token']);

        $lineUser = LineUser::updateOrCreate(
            ['line_user_id' => $claims['sub']],
            ['display_name' => $claims['name'] ?? null]
        );

        $request->session()->put('line_user_local_id', $lineUser->id);

        $intendedLockerId = $request->session()->pull('line_login_intended_locker');
        if ($intendedLockerId) {
            $locker = Locker::find($intendedLockerId);
            if ($locker) {
                Favorite::firstOrCreate(
                    ['line_user_id' => $lineUser->id, 'locker_id' => $locker->id],
                    ['last_checked_report_id' => AvailabilityReport::where('locker_id', $locker->id)->max('id') ?? 0]
                );

                return redirect()->route('lockers.show', $locker)->with('success', '通知登録が完了しました。空きありの報告が投稿されるとLINEでお知らせします。');
            }
        }

        return redirect()->route('lockers.index')->with('success', 'LINEログインが完了しました。');
    }
}
