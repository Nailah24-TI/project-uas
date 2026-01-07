<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Absensi;
use App\Models\JadwalLatihan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAnggota = User::count();
        $totalLatihan = JadwalLatihan::count();

        $hadirHariIni = Absensi::whereDate('tanggal', now())
            ->where('status', 'Hadir')
            ->count();

        $kehadiran = Absensi::select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        $latihanTerakhir = JadwalLatihan::orderByDesc('id')->first();

        $topAnggota = Absensi::select('user_id', DB::raw('COUNT(*) as hadir'))
            ->where('status', 'Hadir')
            ->groupBy('user_id')
            ->orderByDesc('hadir')
            ->with('user')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalAnggota',
            'totalLatihan',
            'hadirHariIni',
            'kehadiran',
            'latihanTerakhir',
            'topAnggota'
        ));
    }
}
