<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');})->name('welcome');


Route::get('dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


Route::resource('users', UserController::class);
use App\Http\Controllers\JadwalLatihanController;

Route::middleware('auth')->group(function () {
    Route::resource('jadwal-latihan', JadwalLatihanController::class)
        ->names([
            'index' => 'jadwal.index',
            'create' => 'jadwal.create',
            'store' => 'jadwal.store',
            'edit' => 'jadwal.edit',
            'update' => 'jadwal.update',
            'destroy' => 'jadwal.destroy'
        ]);
});
use App\Http\Controllers\AuthController;

// AUTH
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerProcess']);

Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
use App\Http\Controllers\AbsensiController;

Route::resource('absensi', AbsensiController::class);

Route::post('/absensi/update-bulk', [AbsensiController::class, 'updateBulk'])
    ->name('absensi.updateBulk');
    Route::resource('absensi', AbsensiController::class);

Route::post('/absensi/store-bulk', [AbsensiController::class, 'storeBulk'])
    ->name('absensi.storeBulk');

Route::get('/absensi/export/excel', [AbsensiController::class, 'exportExcel'])
    ->name('absensi.export');

Route::get('/absensi', [AbsensiController::class, 'index'])
    ->name('absensi.index');

Route::post('/absensi/update-all', [AbsensiController::class, 'updateAll'])
    ->name('absensi.updateAll');



// HALAMAN DASHBOARD (butuh login)
// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     });
// });
