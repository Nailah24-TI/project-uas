<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        // ambil hanya role user
        $anggota = User::where('role', 'user')->get();

        return view('anggota.index', compact('anggota'));
    }
}
