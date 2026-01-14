<?php

use Illuminate\Support\Facades\Route;

Route::domain('{tenant}.rhizomecms.test')
    ->middleware(['identify.tenant'])
    ->group(function () {
        Route::get('/', [App\Http\Controllers\Tenant\SiteController::class, 'index']);
    });

Route::domain('rhizomecms.test')->group(function () {
    Route::view('/', 'welcome');

    Route::view('dashboard', 'dashboard')
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->middleware(['auth'])
        ->name('profile');

    require __DIR__.'/auth.php';
});