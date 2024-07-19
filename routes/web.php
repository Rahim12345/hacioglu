<?php

use App\Http\Controllers\Back\AccountController;
use App\Http\Controllers\Back\ContactController;
use App\Http\Controllers\Back\PairController;
use App\Http\Controllers\Back\PortfolioController;
use App\Http\Controllers\Back\ReviewController;
use App\Http\Controllers\Back\ServiceController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, ['az', 'en', 'ru'])) {
        session()->put('locale', $locale);
    } else {
        session()->put('locale', 'az');
    }

    return redirect()->back();
})
    ->name('lang.switcher');

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::middleware('locale')->group(function () {
    Route::get('/', [HomeController::class, 'home']);
    Route::get('/xidmetler/{slug}', [HomeController::class, 'services'])
        ->name('front.services');
});

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('account', [AccountController::class, 'index'])
        ->name('account.settings');
    Route::post('account', [AccountController::class, 'store'])
        ->name('account.settings.store');

    Route::get('/home', [\App\Http\Controllers\Back\HomeController::class, 'index'])
        ->name('home');

    Route::resource('contact', ContactController::class);
    Route::resource('pairs', PairController::class);
    Route::resource('portfolio', PortfolioController::class);
    Route::resource('review', ReviewController::class);
    Route::resource('service', ServiceController::class);
});
