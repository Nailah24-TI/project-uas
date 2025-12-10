<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
Route::get('dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
use Illuminate\Support\Facades\Auth;
Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
})->name('logout');
