<?php

namespace App\Http\Controllers;

use App\Models\JadwalLatihan;
use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalLatihanController extends Controller
{
    // user
    public function index()
    {
        $jadwal = JadwalLatihan::all();
        return view('jadwal.index', compact('jadwal'));
    }

    // admin
    public function adminIndex()
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
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'lokasi' => 'required'
        ]);

        JadwalLatihan::create($request->all());

        return redirect()->route('admin.jadwal.index')
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


    public function edit(JadwalLatihan $jadwal)
    {
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, JadwalLatihan $jadwal)
    {
        $jadwal->update($request->only([
            'hari',
            'jam_mulai',
            'jam_selesai',
            'lokasi'
        ]));
        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal latihan berhasil diupdate');
    }

    public function destroy(JadwalLatihan $jadwal)
    {
        // baru hapus jadwal
        $jadwal->delete();

        return back()->with('success','Jadwal berhasil dihapus');
    }

}
