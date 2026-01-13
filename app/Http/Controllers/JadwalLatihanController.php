<?php

namespace App\Http\Controllers;

use App\Models\JadwalLatihan;
use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalLatihanController extends Controller
{
    // USER
    public function userIndex()
    {
        $jadwal = JadwalLatihan::all();
        return view('jadwal.index', compact('jadwal'));
    }

    // ADMIN
    public function index()
    {
        $jadwal = JadwalLatihan::all();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        return view('admin.jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal'     => 'required|date',
            'hari'        => 'required|string',
        'lokasi'      => 'required|string',
        'pelatih'     => 'required|string',
            'jam_mulai'   => 'required|date_format:H:i',
        'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ], [
        'jam_selesai.after' => 'Jam selesai harus setelah jam mulai',


        ]);
        JadwalLatihan::create($request->all());

        return redirect()->route('admin.jadwal-latihan.index')
            ->with('success', 'Jadwal latihan berhasil ditambahkan');
    }

    public function absensi(JadwalLatihan $jadwal)
    {
        $tanggal = $jadwal->tanggal;

    $users = User::all();


        foreach ($users as $user) {
            Absensi::firstOrCreate([
                'user_id' => $user->id,
                'tanggal' => $tanggal
            ], [
                'status' => 'Alpa'
            ]);
        }

        $absensis = Absensi::with('user')
            ->where('tanggal', $tanggal)
            ->get();

        return view('admin.absensi.index', compact('absensis', 'tanggal', 'jadwal'));
    }


    public function edit(JadwalLatihan $jadwal_latihan)
    {
        return view('admin.jadwal.edit', [
        'jadwal' => $jadwal_latihan
    ]);}

   public function update(Request $request, JadwalLatihan $jadwal_latihan)
{
    $request->validate([
        'tanggal'     => 'required|date',
         'hari'        => 'required|string',
        'lokasi'      => 'required|string',
        'pelatih'     => 'required|string',
            'jam_mulai'   => 'required|date_format:H:i',
        'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ], [
        'jam_selesai.after' => 'Jam selesai harus setelah jam mulai',


        ]);

        $jadwal_latihan->update([
        'tanggal'     => $request->tanggal,
        'hari'        => $request->hari,
        'jam_mulai'   => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
        'lokasi'      => $request->lokasi,
        'pelatih'     => $request->pelatih,
    ]);
    return redirect()->route('admin.jadwal-latihan.index')
        ->with('success', 'Jadwal latihan berhasil diupdate');
}


    public function destroy(JadwalLatihan $jadwal_latihan)
    {
         $jadwal_latihan->delete();

        return redirect()->route('admin.jadwal-latihan.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }

}
