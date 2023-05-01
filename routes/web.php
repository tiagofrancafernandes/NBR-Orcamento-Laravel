<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', fn () => redirect()->route('admin.index'));
Route::get('/home', fn () => redirect()->route('admin.index'));

Auth::routes();

Route::name('admin.')->prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\MainDashboardController::class, 'index'])->name('index');
});