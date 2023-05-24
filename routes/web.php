<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ComposicaoController;
use App\Http\Controllers\Admin\MainDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', fn () => redirect()->route('main_dashboard.index'));
Route::get('/home', fn () => redirect()->route('main_dashboard.index'));

Auth::routes();

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [MainDashboardController::class, 'index'])->name('main_dashboard.index');

    Route::prefix('composicoes')->name('composicoes.')->group(function () {
        Route::get('/', [ComposicaoController::class, 'index'])->name('index');
    });
});

Route::get('/try/view', function (Illuminate\Http\Request $request) {
    $request->validate([
        'view' => 'required|string|min:1'
    ]);

    return view($request->get('view'));
})->name('try.view');
