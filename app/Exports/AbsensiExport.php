<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AbsensiExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Ambil data absensi
     */
    public function collection()
    {
        return Absensi::with('user')->get();
    }

    /**
     * Header kolom Excel (WAJIB)
     */
    public function headings(): array
    {
        return [
            'Nama',
            'Tanggal',
            'Status'
        ];
    }

    /**
     * Mapping data ke kolom Excel
     */
    public function map($absensi): array
    {
        return [
            $absensi->user->name ?? '-',
            $absensi->tanggal,
            $absensi->status
        ];
    }
}
