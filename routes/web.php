<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalLatihanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsensiController;

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

    // wajib login
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

        Route::get('/home', [HomeController::class, 'index'])
        ->name('home');
    });

    // role user
    Route::middleware(['auth', 'role:user'])->group(function () {
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
    Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
        // CRUD ANGGOTA
        Route::resource('users', UserController::class);

        // CRUD JADWAL LATIHAN
        Route::get('/jadwal-latihan', [JadwalLatihanController::class, 'adminIndex'])
        ->name('admin.jadwal.index');

        Route::resource('jadwal-latihan', JadwalLatihanController::class)
        ->except(['index', 'show'])
        ->names([
            'create'  => 'admin.jadwal.create',
            'store'   => 'admin.jadwal.store',
            'edit'    => 'admin.jadwal.edit',
            'update'  => 'admin.jadwal.update',
            'destroy' => 'admin.jadwal.destroy',
        ]);
        // Route::get('/jadwal-latihan/create', [JadwalLatihanController::class, 'create'])
        //     ->name('admin.jadwal.create');

        // Route::post('/jadwal-latihan', [JadwalLatihanController::class, 'store'])
        //     ->name('admin.jadwal.store');

        // Route::get('/jadwal-latihan/{jadwal}/edit', [JadwalLatihanController::class, 'edit'])
        //     ->name('admin.jadwal.edit');

        // Route::put('/jadwal-latihan/{jadwal}', [JadwalLatihanController::class, 'update'])
        //     ->name('admin.jadwal.update');

        // Route::delete('/jadwal-latihan/{jadwal}', [JadwalLatihanController::class, 'destroy'])
        //     ->name('admin.jadwal.destroy');

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

// ===cadangan====
// Route::middleware('auth')->group(function () {
//     Route::resource('jadwal-latihan', JadwalLatihanController::class)
//         ->names([
//             'index' => 'jadwal.index',
//             'create' => 'jadwal.create',
 //             'store' => 'jadwal.store',
 //             'edit' => 'jadwal.edit',
//             'update' => 'jadwal.update',
//             'destroy' => 'jadwal.destroy'
//         ]);
// });
// Route::resource('absensi', AbsensiController::class);
// Route::post('/absensi/update-bulk', [AbsensiController::class, 'updateBulk'])
//     ->name('absensi.updateBulk');
//     Route::resource('absensi', AbsensiController::class);

// Route::post('/absensi/store-bulk', [AbsensiController::class, 'storeBulk'])
//     ->name('absensi.storeBulk');

// Route::get('/absensi/export/excel', [AbsensiController::class, 'exportExcel'])
//     ->name('absensi.export');

// Route::get('/absensi', [AbsensiController::class, 'index'])
//     ->name('absensi.index');

// Route::post('/absensi/update-all', [AbsensiController::class, 'updateAll'])
//     ->name('absensi.updateAll');

// halaman guest


// HALAMAN DASHBOARD (butuh login)
// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     });
// });
