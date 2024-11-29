<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Database\Seeders\NilaiTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $kelasData = [];

        // Tingkat 1: Mandiri 1-10
        for ($i = 1; $i <= 10; $i++) {
            $kelasData[] = [
                'nama_kelas' => 'Mandiri ' . $i,
                'tingkat' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Tingkat 2: Disiplin 1-10
        for ($i = 1; $i <= 10; $i++) {
            $kelasData[] = [
                'nama_kelas' => 'Disiplin ' . $i,
                'tingkat' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Tingkat 3: Prestasi 1-10
        for ($i = 1; $i <= 10; $i++) {
            $kelasData[] = [
                'nama_kelas' => 'Prestasi ' . $i,
                'tingkat' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Kelas::insert($kelasData);

        $this->call([
            MapelSeeder::class,
            NilaiTableSeeder::class
        ]);
    }
}
