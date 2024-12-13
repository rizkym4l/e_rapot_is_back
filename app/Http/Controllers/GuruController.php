<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\NilaiSiswa;
use Illuminate\Http\Request;
use App\Models\GuruMapelKelas;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{

    public function deleteTeacher(Request $id)
    {
        $guru = Guru::findOrFail($id);
        return 'ini ada tolollllll' . $guru;
           
        try {
            $guru = Guru::findOrFail($id);
    
            $guru->delete();
            return "222222/";
    
            // return redirect()->route('index.teacher')->with('success', 'Guru berhasil dihapus.');
        } catch (\Exception $e) {
        return "222222/";

            // return redirect()->route('index.teacher')->with('error', 'Terjadi kesalahan saat menghapus user.');
        }
    }
    

    public function adminTeacher(){
        $teachers = Guru::paginate(5);
       
        foreach ($teachers as $key) {
             $key['mapel_id'] = Mapel::where("id",$key['mapel_id'])->get('nama')[0];
        }

        return view("admin.Teacher.index",["teachers" => $teachers]);
        
    }
    public function index()
    {
        $nama = Guru::where('akun_id', Auth::user()->id)->get();
        return view('guru.dahshboardasli', ['nama' => $nama[0]['nama_lengkap']]);
    }

    public function pilihKelas(Request $request)
    {
        $guru = auth()->user()->guru;
        $classes = $guru->kelas;

        return view('guru.pilih_kelas', compact('classes'));
    }
    public function pilihSiswa($kelas_id)
    {
        $siswa = Siswa::where('kelas_id', $kelas_id)->get();

        return view('guru.pilih_siswa', compact('siswa', 'kelas_id'));
    }
    public function tampilkanNilai($siswa_id)
    {
        $guru = auth()->user()->guru;
        $mapel_id = $guru->mapel_id;

        $nilaiSiswa = NilaiSiswa::where('nis_siswa', $siswa_id)
            ->where('mapel_id', $mapel_id)
            ->with('nilaiNama')
            ->get();

        $siswa = Siswa::where('nis', $siswa_id)->first();

        $nilaiSiswa = $nilaiSiswa->sortBy('semester');
        $mapel = Mapel::select('nama')->where('id', $mapel_id)->first();
        // dd($nilaiSiswa[0]['nilaiNama']['name']);

        return view('guru.tampilkan_nilai', compact('nilaiSiswa', 'siswa', 'mapel'));
    }




}
