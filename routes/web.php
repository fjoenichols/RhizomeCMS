<?php

use Illuminate\Support\Facades\Route;

Route::domain('{tenant}.rhizomecms.test')
    ->middleware(['identify.tenant'])
    ->group(function () {
        Route::get('/', [App\Http\Controllers\Tenant\SiteController::class, 'index']);
    });

Route::domain('rhizomecms.test')->group(function () {
    Route::view('/', 'welcome');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
        Route::view('profile', 'profile')->name('profile');
        Route::post('/sites', [App\Http\Controllers\SiteController::class, 'store'])
            ->name('sites.store');
    });
    
    require __DIR__.'/auth.php';
});