<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalLatihanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AnggotaController;

// halaman umum
Route::get('/', function () {
    return view('welcome');})->name('welcome');


    // AUTH guest
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'loginProcess']);

        Route::get('/register', [AuthController::class, 'register']);
        Route::post('/register', [AuthController::class, 'registerProcess']);
    });
        Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

        Route::get('/home', [HomeController::class, 'index'])
        ->name('home');

        Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');
        });
    // role user
    Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
        //user lihat jadwal latihan
        Route::get('/jadwal-latihan', [JadwalLatihanController::class, 'userIndex'])
        ->name('jadwal.index');
        // USER ABSENSI (LIHAT & ISI SENDIRI)
        Route::get('/absensi', [AbsensiController::class, 'userIndex'])
        ->name('absensi.index');

        Route::post('/absensi', [AbsensiController::class, 'userStore'])
        ->name('absensi.user.store');
    });

    // role admin
    Route::middleware(['auth', 'role:admin'])
        ->prefix('admin')
        ->name('admin.') // ⬅️ INI WAJIB
        ->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])
            ->name('admin.dashboard');

        Route::resource('users', UserController::class);

        Route::resource('jadwal-latihan', JadwalLatihanController::class)
        ->except(['show']);

        // ABSENSI ADMIN
        Route::get('absensi', [AbsensiController::class, 'index'])
        ->name('admin.absensi.index');

        Route::put('absensi/{absensi}', [AbsensiController::class, 'update'])
        ->name('admin.absensi.update');

        Route::post('absensi/store-bulk', [AbsensiController::class, 'storeBulk'])
            ->name('absensi.storeBulk');

        Route::post('absensi/update-bulk', [AbsensiController::class, 'updateBulk'])
            ->name('absensi.updateBulk');

        Route::post('absensi/update-all', [AbsensiController::class, 'updateAll'])
            ->name('absensi.updateAll');

        Route::get('absensi/export/excel', [AbsensiController::class, 'exportExcel'])
            ->name('absensi.export');
    });

    Route::middleware(['auth'])->group(function () {
    Route::get('/anggota', [AnggotaController::class, 'index'])
        ->name('anggota.index');
});
