<?php

namespace App\Imports;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\NilaiSiswa;
use App\Models\NilaiHistory; // Import model NilaiHistory
use App\Models\TahunAjaran;
use Maatwebsite\Excel\Concerns\ToArray;
use Exception;
use Illuminate\Support\Facades\Auth;

class NilaiImport implements ToArray
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @param array $rows
     *
     * @return void
     * @throws Exception
     */
    public function array(array $rows)
    {
        $header = array_shift($rows);

        foreach ($rows as $row) {
            if (count($row) < 4) {
                throw new Exception('Baris data tidak lengkap: ' . json_encode($row));
            }

            $siswa = Siswa::where('nis', $row[0])->first();
            if (!$siswa) {
                throw new Exception('NIS tidak tersedia: ' . $row[0]);
            }

            $tahunAjaran = TahunAjaran::where('tahun', $row[3])->first();
            if (!$tahunAjaran) {
                throw new Exception('Tahun ajaran tidak tersedia: ' . $row[3]);
            }

            $existingNilai = NilaiSiswa::where('nis_siswa', $siswa->nis)
                ->where('semester', $this->data['semester'])
                ->where('mapel_id', $this->data['mapel'])
                ->where('nilai_id', $this->data['nilai'])
                ->first();

            $mapel = Mapel::where('id', $this->data['mapel'])->first();

            if ($existingNilai) {
                $name = Nilai::where('id', $existingNilai->nilai_id)->first();
                throw new Exception('Nilai "' . $name['name'] . ' untuk mapel ' . $mapel['nama'] . '" dari murid dengan NIS ' . $siswa->nis . ' telah terisi. Jika ingin mengubah atau menghapus nilai, silahkan beralih ke fitur perbaikan nilai.');
            }

            if (($this->data['nilai'])) {
                // Simpan Nilai Baru
                $newNilai = NilaiSiswa::create([
                    'nilai_id' => $this->data['nilai'],
                    'keterangan' => $row[1],
                    'tingkat' => $this->data['tingkat'],
                    'semester' => $this->data['semester'],
                    'nilai' => $row[2],
                    'mapel_id' => $this->data['mapel'],
                    'tahun_ajaran_id' => $tahunAjaran->id,
                    'nis_siswa' => $siswa->nis,
                ]);

                // Catat History Nilai
                NilaiHistory::create([
                    'nilai_siswa_id' => $newNilai->id,
                    'user_id' => Auth::id(),
                    'updated_by' => null,
                    'nilai_before' => null, // Ini karena ini nilai baru
                    'nilai_after' => $row[2], // Nilai yang diimpor
                    'created_at' => now(),
                    'updated_at' => null,
                ]);
            } else {
                throw new Exception('Nilai type tidak valid: ' . $this->data['nilai']);
            }
        }
    }
}
