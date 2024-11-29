<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NilaiExport implements FromArray, WithHeadings, ShouldAutoSize
{
    /**
     * Return an array with headers only.
     *
     * @return array
     */
    public function array(): array
    {
        return [];
    }

    /**
     * Set the headings for the Excel file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nis Siswa',
            'Keterangan',
            'Nilai',
            'Tahun Ajaran',
        ];
    }
}
