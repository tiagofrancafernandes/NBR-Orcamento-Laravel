<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ComposicaoController;
use App\Http\Controllers\Admin\MainDashboardController;

Route::get('/', fn () => redirect()->route('filament.pages.dashboard'));
Route::get('/login', fn () => redirect()->route('filament.pages.dashboard'))->name('login');
Route::get('/home', fn () => redirect()->route('filament.pages.dashboard'));

// Auth::routes();

Route::prefix('old')->name('old.')->group(function () {
    Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::get('/', [MainDashboardController::class, 'index'])->name('main_dashboard.index');

        Route::prefix('composicoes')->name('composicoes.')->group(function () {
            Route::get('/', [ComposicaoController::class, 'index'])->name('index');
        });
    });
});

Route::get('/try/view', function (Illuminate\Http\Request $request) {
    $request->validate([
        'view' => 'required|string|min:1'
    ]);

    return view($request->get('view'));
})->name('try.view');
