<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;
use App\Models\JadwalLatihan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiExport;


class AbsensiController extends Controller
{
    public function index()
    {
        $tanggal = Carbon::today();

        // Ambil semua user (anggota)
        $users = User::all();

        // Auto-generate absensi harian
        foreach ($users as $user) {
            Absensi::firstOrCreate(
                [
                    'user_id' => $user->id,
                    'tanggal' => $tanggal
                ],
                [
                    'status' => 'Alpa'
                ]
            );
        }

        $absensis = Absensi::with('user')
            ->where('tanggal', $tanggal)
            ->get();

        return view('admin.absensi.index', compact('absensis', 'tanggal'));
    }
    public function updateAll(Request $request)
{
    foreach ($request->status ?? [] as $id => $status) {
        Absensi::where('id', $id)->update([
            'status' => $status
        ]);
    }

    return back()->with('success', 'Absensi berhasil disimpan');
}


    // Simpan absensi massal (checkbox / spreadsheet)
    public function updateBulk(Request $request)
    {
        foreach ($request->status ?? [] as $absensiId => $status) {
            Absensi::where('id', $absensiId)->update([
                'status' => $status
            ]);
        }

        return back()->with('success', 'Absensi berhasil disimpan');
    }

    // Export Excel
    public function exportExcel()
    {
        return Excel::download(new AbsensiExport, 'absensi.xlsx');
    }

    // Hapus absensi (jarang dipakai)
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return back()->with('success', 'Absensi berhasil dihapus');
    }
    public function storeBulk(Request $request)
{
    foreach ($request->absensi as $id => $data) {
        Absensi::updateOrCreate(
            ['id' => $id],
            [
                'nama'    => $data['nama'],
                'tanggal' => $data['tanggal'],
                'status'  => $data['status'],
            ]
        );
    }

}}

