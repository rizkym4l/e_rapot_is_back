<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapels = [
            ['nama' => 'Fiqh', 'kode_mapel' => 'FIQH'],
            ['nama' => 'Tafsir Tematik', 'kode_mapel' => 'TAFSIR'],
            ['nama' => 'Sejarah Kebudayaan Islam (SKI)', 'kode_mapel' => 'SKI'],
            ['nama' => 'Bahasa Arab', 'kode_mapel' => 'ARAB'],
            ['nama' => 'Nahwu', 'kode_mapel' => 'NAHWU'],
            ['nama' => 'Tasrif', 'kode_mapel' => 'TASRIF'],
            ['nama' => 'Khot Imla', 'kode_mapel' => 'KHOT'],
            ['nama' => 'Pendidikan Pancasila dan Kewarganegaraan', 'kode_mapel' => 'PPKN'],
            ['nama' => 'Bahasa Indonesia', 'kode_mapel' => 'INDO'],
            ['nama' => 'Matematika', 'kode_mapel' => 'MATH'],
            ['nama' => 'Ilmu Pengetahuan Alam (IPA)', 'kode_mapel' => 'IPA'],
            ['nama' => 'Ilmu Pengetahuan Sosial (IPS)', 'kode_mapel' => 'IPS'],
            ['nama' => 'Bahasa Inggris', 'kode_mapel' => 'ENG'],
            ['nama' => 'Informatika', 'kode_mapel' => 'IT'],
        ];

        DB::table('mapel')->insert($mapels);
    }

}
