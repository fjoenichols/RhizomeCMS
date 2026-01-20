<?php

use Illuminate\Support\Facades\Route;

Route::domain('{tenant}.rhizomecms.test')
    ->middleware(['identify.tenant'])
    ->group(function () {
        Route::get('/', [App\Http\Controllers\Tenant\SiteController::class, 'index']);
        Route::get('/{page_slug}', [App\Http\Controllers\Tenant\SiteController::class, 'showPage']);
    });

Route::domain('rhizomecms.test')->group(function () {
    Route::view('/', 'welcome');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
        Route::view('profile', 'profile')->name('profile');
        Route::post('/sites', [App\Http\Controllers\SiteController::class, 'store'])
            ->name('sites.store');
        Route::get('/sites/{site}/edit', [App\Http\Controllers\SiteController::class, 'edit'])->name('sites.edit');
        Route::put('/sites/{site}', [App\Http\Controllers\SiteController::class, 'update'])->name('sites.update');
        Route::delete('/sites/{site}', [App\Http\Controllers\SiteController::class, 'destroy'])->name('sites.destroy');
    });

    require __DIR__.'/auth.php';
});