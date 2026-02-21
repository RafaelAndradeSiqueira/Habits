<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HabitsController;

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

    Route::resource('/dashboard/habits', HabitsController::class)->except('show');
    Route::get('/dashboard/habits/configurar', [HabitsController::class, 'settings'])->name('habits.settings');
    Route::post('/dashboard/habits/{habit}/toggle', [HabitsController::class, 'toggle'])->name('habits.toggle');
    Route::get('/dashboard/habits/historico/{year?}', [HabitsController::class, 'history'])
    ->whereNumber('year')
    ->name('habits.history');
});









