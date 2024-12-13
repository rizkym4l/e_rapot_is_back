<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'password' => Hash::make($row['password']),
            'role'     => $row['role'],
            'nis_nipk' => $row['nis_nipk'] ?? null,
            'kelas_id' => $row['kelas_id'] ?? null,
            'tingkat'  => $row['tingkat'] ?? null,
            'mapel_id' => $row['mapel_id'] ?? null,
        ]);
    }
}
