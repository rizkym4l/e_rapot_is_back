<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiTableSeeder extends Seeder
{
    public function run()
    {
        $mapel = Mapel::all();

        $nis_siswa = 12209394;
        $tahun_ajaran_id = 1;
        $semester = 1;

        foreach ($mapel as $mapelData) {
            DB::table('nilai')->insert([
                'nama' => 'sumatif 1',
                'keterangan' => '',
                'tingkat' => 1,
                'semester' => $semester,
                'nilai' => 90.00,
                'mapel_id' => $mapelData['id'],
                'tahun_ajaran_id' => $tahun_ajaran_id,
                'nis_siswa' => $nis_siswa,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
