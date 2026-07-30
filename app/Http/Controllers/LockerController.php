<?php

namespace App\Http\Controllers;

use App\Models\Locker;
use App\Support\ContentModeration;
use Illuminate\Http\Request;

class LockerController extends Controller
{
    public function index(Request $request)
    {
        $query = Locker::query()->with(['availabilityReports' => fn ($q) => $q->latest()]);

        if ($request->filled('station')) {
            $query->where('station_name', $request->input('station'));
        }

        $lockers = $query->latest()->get();
        $stations = Locker::query()->distinct()->orderBy('station_name')->pluck('station_name');

        return view('lockers.index', compact('lockers', 'stations'));
    }

    public function create()
    {
        return view('lockers.create');
    }

    public function store(Request $request)
    {
        if (! empty($request->input('website'))) {
            return redirect()->route('lockers.thanks');
        }

        $validated = $request->validate([
            'station_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'area_label' => 'nullable|string|max:255',
            'walk_time' => 'nullable|string|max:50',
            'lat' => 'required|numeric|between:-90,90',
            'lng' => 'required|numeric|between:-180,180',
            'price_s' => 'nullable|integer|min:0|max:100000',
            'price_m' => 'nullable|integer|min:0|max:100000',
            'price_l' => 'nullable|integer|min:0|max:100000',
            'notes' => 'nullable|string|max:500',
        ]);

        if (ContentModeration::containsNgWord($validated['name'] . ' ' . ($validated['notes'] ?? ''))) {
            return back()->withErrors(['name' => '投稿内容に使用できない文字列が含まれています。'])->withInput();
        }

        $ipHash = ContentModeration::clientIpHash($request);
        if (ContentModeration::isTooSoon("locker-create:{$ipHash}", 30)) {
            return back()->withErrors(['name' => '投稿間隔が短すぎます。しばらく待ってから再度お試しください。'])->withInput();
        }

        Locker::create($validated);

        return redirect()->route('lockers.thanks');
    }

    public function show(Locker $locker)
    {
        $locker->load(['reviews' => fn ($q) => $q->latest()]);
        $locker->load(['availabilityReports' => fn ($q) => $q->latest()]);

        $isWatching = session('line_user_local_id')
            ? $locker->favorites()->where('line_user_id', session('line_user_local_id'))->exists()
            : false;

        return view('lockers.show', compact('locker', 'isWatching'));
    }

    public function sitemap()
    {
        $lockers = Locker::select('id', 'updated_at')->get();
        $xml = view('sitemap', compact('lockers'))->render();

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
