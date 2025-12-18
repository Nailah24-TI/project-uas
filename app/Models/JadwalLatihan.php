<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalLatihan extends Model
{
    use HasFactory;

    protected $fillable = [
         'tanggal',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'lokasi',
        'pelatih',
        'keterangan'
    ];
}
