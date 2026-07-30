<?php

namespace App\Http\Controllers;

use App\Models\Locker;
use App\Support\ContentModeration;
use Illuminate\Http\Request;

class AvailabilityReportController extends Controller
{
    public function store(Request $request, Locker $locker)
    {
        if (! empty($request->input('website'))) {
            return back()->with('success', '投稿を受け付けました。');
        }

        $validated = $request->validate([
            'size' => 'required|in:S,M,L',
            'status' => 'required|in:あり,残りわずか,満',
            'comment' => 'nullable|string|max:500',
            'nickname' => 'nullable|string|max:30',
        ]);

        if (! empty($validated['comment']) && ContentModeration::containsNgWord($validated['comment'])) {
            return back()->withErrors(['comment' => '投稿内容に使用できない文字列が含まれています。'])->withInput();
        }

        $ipHash = ContentModeration::clientIpHash($request);
        if (ContentModeration::isTooSoon("availability-report:{$locker->id}:{$ipHash}", 30)) {
            return back()->withErrors(['status' => '投稿間隔が短すぎます。しばらく待ってから再度お試しください。'])->withInput();
        }

        $locker->availabilityReports()->create([
            'size' => $validated['size'],
            'status' => $validated['status'],
            'comment' => $validated['comment'] ?? null,
            'nickname' => ($validated['nickname'] ?? '') !== '' ? $validated['nickname'] : '匿名',
            'ip_hash' => $ipHash,
        ]);

        return back()->with('success', '空き状況の報告を投稿しました。ありがとうございます。');
    }
}
