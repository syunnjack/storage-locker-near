<?php

use App\Http\Controllers\AvailabilityReportController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LineLoginController;
use App\Http\Controllers\LineWebhookController;
use App\Http\Controllers\LockerController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LockerController::class, 'index'])->name('lockers.index');
Route::get('/create', [LockerController::class, 'create'])->name('lockers.create');
Route::post('/lockers', [LockerController::class, 'store'])->name('lockers.store')->middleware('throttle:5,1');
Route::get('/lockers/{locker}', [LockerController::class, 'show'])->name('lockers.show');
Route::post('/lockers/{locker}/reviews', [ReviewController::class, 'store'])->name('lockers.reviews.store')->middleware('throttle:10,1');
Route::post('/lockers/{locker}/availability-reports', [AvailabilityReportController::class, 'store'])
    ->name('lockers.availability-reports.store')
    ->middleware('throttle:10,1');
Route::view('/thanks', 'lockers.thanks')->name('lockers.thanks');

Route::view('/about', 'about')->name('about');
Route::get('/sitemap.xml', [LockerController::class, 'sitemap'])->name('sitemap');

// LINE連携（お気に入りロッカーの空きあり通知）
Route::get('/line/login', [LineLoginController::class, 'redirect'])->name('line.login');
Route::get('/line/callback', [LineLoginController::class, 'callback'])->name('line.callback');
Route::post('/lockers/{locker}/favorite', [FavoriteController::class, 'toggle'])
    ->name('lockers.favorite.toggle')
    ->middleware('throttle:10,1');
Route::post('/line/webhook', [LineWebhookController::class, 'handle'])->name('line.webhook');
