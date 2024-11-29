<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;

use App\Models\NilaiSiswa;
use App\Models\TahunAjaran;
use App\Exports\NilaiExport;
use App\Imports\NilaiImport;
use App\Models\NilaiHistory;
use Illuminate\Http\Request;



use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{
    public function history($id)
    {
        $nilai = Nilai::findOrFail($id);
        $history = NilaiHistory::where('nilai_id', $id)->with('user')->orderBy('created_at', 'desc')->get();

        return view('nilai.history', compact('nilai', 'history'));
    }

    // public function index($tingkat, $semester)


    // {
    //     $sap = Nilai::select('name', 'id')->get();
    //     $user = Auth::user()->id;
    //     $siswa = Siswa::where('akun_id', $user)->with('kelas')->first();
    //     $allMapels = Mapel::orderBy('id')->get();

    //     $data = [];
    //     $header = ['NO', 'Mata Pelajaran'];

    //     foreach ($sap as $n) {
    //         $header[] = $n->name;
    //     }
    //     $header;
    //     $data[] = $header;
    //     // $nilaiData = ' '9;
    //     foreach ($allMapels as $mapel) {
    //         $nilaiData = NilaiSiswa::where('tingkat', $tingkat)
    //             ->where('semester', $semester)
    //             ->where('nis_siswa', $siswa->nis)
    //             ->where('mapel_id', $mapel->id)
    //             ->get();

    //         $mapelData = [
    //             'mapel_id' => $mapel->nama,
    //         ];

    //         foreach ($sap as $n) {
    //             $mapelData[$n->name] = null;
    //         }

    //         foreach ($nilaiData as $nilai) {
    //             $nilaiName = $sap->firstWhere('id', $nilai->nilai_id)->name;
    //             $mapelData[$nilaiName] = $nilai->nilai;
    //         }

    //         $data[] = $mapelData;
    //     }

    //     $nilai_murid = NilaiSiswa::select('tahun_ajaran_id')->where('nis_siswa', $siswa->nis)
    //         ->where('tingkat', $tingkat)
    //         ->where('semester', $semester)
    //         ->get();

    //     if ($nilai_murid->isEmpty()) {
    //         return view('nilaisiswa', [
    //             'data' => $data,
    //             'siswa' => $siswa,
    //             'tahun_ajaran' => null,
    //             'sap' => $sap,
    //             'nama_kelas' => $siswa->kelas->nama_kelas,
    //             'semester' => $semester,
    //             'tingkat' => $tingkat,
    //             'error' => 'Data tahun ajaran belum tersedia.',
    //         ]);
    //     }

    //     $tahun_ajaran = TahunAjaran::select('tahun')->where('id', $nilai_murid[0]->tahun_ajaran_id)->first();
    //     $history = NilaiHistory::get();
    //     $nilai_history = [];
    //     $nilai_history_siswa = NilaiSiswa::where('tingkat', $tingkat)
    //         ->where('semester', $semester)
    //         ->where('nis_siswa', $siswa->nis)
    //         ->get();
    //     // dd($nilai_history_siswa[0]);
    //     foreach ($history as $h) {

    //         if ($h->nilai_siswa_id == $nilai_history_siswa->first()->id) {
    //             array_push($nilai_history, $h);

    //         }


    //     }


    //     // dd(
    //     //     $nilai_history
    //     // );
    //     return view('nilaisiswa', [
    //         'data' => $data,
    //         'siswa' => $siswa,
    //         'tahun_ajaran' => $tahun_ajaran,
    //         'sap' => $sap,
    //         'nama_kelas' => $siswa->kelas->nama_kelas,
    //         'semester' => $semester,
    //         'tingkat' => $tingkat,
    //         'history' => $nilai_history
    //     ]);
    // }


    public function index($tingkat, $semester)
    {
        $sap = Nilai::select('name', 'id')->get();
        $user = Auth::user()->id;
        $siswa = Siswa::where('akun_id', $user)->with('kelas')->first();
        $allMapels = Mapel::orderBy('id')->get();

        $data = [];
        $header = ['NO', 'Mata Pelajaran'];

        foreach ($sap as $n) {
            $header[] = $n->name;
        }

        $data[] = $header;

        foreach ($allMapels as $mapel) {
            $nilaiData = NilaiSiswa::where('tingkat', $tingkat)
                ->where('semester', $semester)
                ->where('nis_siswa', $siswa->nis)
                ->where('mapel_id', $mapel->id)
                ->get();

            $mapelData = [
                'mapel_id' => $mapel->nama,
            ];

            foreach ($sap as $n) {
                $mapelData[$n->name] = null;
            }

            foreach ($nilaiData as $nilai) {
                $nilaiName = $sap->firstWhere('id', $nilai->nilai_id)->name;
                $mapelData[$nilaiName] = $nilai->nilai;
            }

            $data[] = $mapelData;
        }

        $nilai_murid = NilaiSiswa::select('tahun_ajaran_id')->where('nis_siswa', $siswa->nis)
            ->where('tingkat', $tingkat)
            ->where('semester', $semester)
            ->get();

        if ($nilai_murid->isEmpty()) {
            return view('nilaisiswa', [
                'data' => $data,
                'siswa' => $siswa,
                'tahun_ajaran' => null,
                'sap' => $sap,
                'nama_kelas' => $siswa->kelas->nama_kelas,
                'semester' => $semester,
                'tingkat' => $tingkat,
                'error' => 'Data tahun ajaran belum tersedia.',
            ]);
        }

        $tahun_ajaran = TahunAjaran::select('tahun')->where('id', $nilai_murid[0]->tahun_ajaran_id)->first();

        // Query untuk menampilkan history nilai dengan join ke tabel terkait
        $history = NilaiHistory::select('nilai_history.*', 'mapel.nama as mapel_name', 'nilai.name as nilai_name')
            ->join('nilai_siswa', 'nilai_siswa.id', '=', 'nilai_history.nilai_siswa_id')
            ->join('mapel', 'nilai_siswa.mapel_id', '=', 'mapel.id')
            ->join('nilai', 'nilai.id', '=', 'nilai_siswa.nilai_id')
            ->where('nilai_siswa.nis_siswa', $siswa->nis)
            ->where('nilai_siswa.tingkat', $tingkat)
            ->where('nilai_siswa.semester', $semester)
            ->paginate(5);

        return view('nilaisiswa', [
            'data' => $data,
            'siswa' => $siswa,
            'tahun_ajaran' => $tahun_ajaran,
            'sap' => $sap,
            'nama_kelas' => $siswa->kelas->nama_kelas,
            'semester' => $semester,
            'tingkat' => $tingkat,
            'history' => $history
        ]);
    }

    public function fetchNilai(Request $request, $nis)
    {
        // return 'sadasd';
        $tahunAjaranId = $request['tahun_ajaran_id'];
        $semesterId = $request['semester_id'];

        $nilaiSiswa = NilaiSiswa::where('nis_siswa', $nis)->where('tingkat', $tahunAjaranId)
            ->where('semester', $semesterId)
            ->with('nilaiNama')
            ->get();

        $nilaiSiswa->load('mapel');

        return response()->json($nilaiSiswa);
    }

    public function semester($tingkat, $kelas, $mapel)
    {

        return view('semester', ['tingkat' => $tingkat, 'kelas' => $kelas, 'mapel' => $mapel]);

    }


    public function cetak($nis)
    {
        $semester = request()->input('semester');
        $tingkat = request()->input('tingkat');
        $siswa = Siswa::where('nis', $nis)->with('kelas')->first();
        $sap = Nilai::select('name', 'id')->get();
        $allMapels = Mapel::orderBy('id')->get();


        $data = [];
        $header = ['NO', 'Mata Pelajaran'];

        foreach ($sap as $n) {
            $header[] = $n->name;
        }
        $header;
        $data[] = $header;
        $tahunAjaran = '';

        foreach ($allMapels as $mapel) {
            $nilaiData = NilaiSiswa::where('semester', $semester)
                ->where('tingkat', $tingkat)
                ->where('nis_siswa', $siswa->nis)
                ->where('mapel_id', $mapel->id)
                ->get();

            if ($nilaiData->isNotEmpty()) {
                $tahunAjaran = TahunAjaran::select('tahun')->where('id', $nilaiData->first()->tahun_ajaran_id)->get();
                $tahunAjaran = $tahunAjaran->first()['tahun'];
            } else {
                $tahunAjaran = '2024/2025';
            }

            $mapelData = [
                'mapel_id' => $mapel->nama,
            ];

            foreach ($sap as $n) {
                $mapelData[$n->name] = null;
            }

            foreach ($nilaiData as $nilai) {
                $nilaiName = $sap->firstWhere('id', $nilai->nilai_id)->name;
                $mapelData[$nilaiName] = $nilai->nilai;
                if ($nilai->keterangan) {
                    $mapelData['keterangan'] = $nilai->keterangan;
                }
            }

            $data[] = $mapelData;
        }
        // dd($data);

        $pdf = Pdf::loadView('cetak_nilai', [
            'data' => $data,
            'siswa' => $siswa,
            'tahun' => $tahunAjaran,
            'sap' => $sap,
            'nama_kelas' => $siswa->kelas->nama_kelas,
            'semester' => $semester,
        ]);

        return $pdf->download('nilai_siswa_' . $siswa->nis . '.pdf');
    }

    public function nilai($tingkat, $kelas, $mapel, $semester)
    {
        $nilai = Nilai::select('name', 'id')->get();
        // dd($nilai);
        // die();
        return view('nilai', ['tingkat' => $tingkat, 'kelas' => $kelas, 'mapel' => $mapel, 'semester' => $semester, 'data' => $nilai]);

    }
    public function create($tingkat, $kelas, $mapel, $semester, $nilai)
    {
        $class = Kelas::find($kelas);
        $Mapel = Mapel::find($mapel);
        $nilai1 = $nilai;

        switch ($nilai1) {
            case 1:
                $nilai = 'Formatif 1';
                break;
            case 2:
                $nilai = 'Formatif 2';
                break;
            case 3:
                $nilai = 'Sumatif 1';
                break;
            case 4:
                $nilai = 'Sumatif 2';
                break;
            case 5:
                $nilai = 'Sumatif 3';
                break;
            case 6:
                $nilai = 'STS';
                break;
            case 7:
                $nilai = 'TA';
                break;
            case 8:
                $nilai = 'SAS';
                break;
            default:
                $nilai = null;
                break;
        }
        $siswaCollection = Siswa::where('kelas_id', $class->id)->get();





        return view('guru.dashboard', compact('tingkat', 'Mapel', 'class', 'kelas', 'mapel', 'semester', 'nilai', 'nilai1', 'siswaCollection'));
    }




    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'mapel_id' => 'required|exists:mapel,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajaran,id',
            'nama' => 'required|string|max:100',
            'nilai' => 'required|numeric|min:0|max:100',
            'keterangan' => 'nullable|string|max:255',
        ]);


        $nilai = new Nilai;
        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->mapel_id = $request->input('mapel_id');
        $nilai->tahun_ajaran_id = $request->input('tahun_ajaran_id');
        $nilai->nama = $request->input('nama');
        $nilai->nilai = $request->input('nilai');
        $nilai->keterangan = $request->input('keterangan');
        $nilai->tingkat = $request->input('tingkat');
        $nilai->semester = $request->input('semester');

        $nilai->save();

        return redirect()->route('nilai.create')->with('success', 'Nilai berhasil disimpan');
    }

    public function import(Request $request)
    {
        $data = $request->only(['tingkat', 'kelas', 'mapel', 'semester', 'nilai']);

        try {
            Excel::import(new NilaiImport($data), $request->file('file'));


            return redirect()->back()->with('success', 'Data berhasil diimpor!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function export()
    {
        return Excel::download(new NilaiExport, 'NilaiTemplate.xlsx');
    }


    public function edit($id)
    {
        $nilai = NilaiSiswa::findOrFail($id);
        $mapel = Mapel::all();
        return view('guru.edit_nilai', compact('nilai', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required|numeric',
            // 'keterangan' => 'nullable|string',
        ]);

        $nilai = NilaiSiswa::findOrFail($id);
        $oldNilai = $nilai->nilai;
        $nilai->nilai = $request->input('nilai');
        $nilai->save();
        // $nilai->keterangan = $request->input('keterangan');
        $created = NilaiHistory::where('nilai_siswa_id', $nilai->id)->firstOr();
        NilaiHistory::create([
            'nilai_siswa_id' => $nilai->id,
            'user_id' => Auth::user()->id,
            'updated_by' => null,
            'nilai_before' => $oldNilai,
            'nilai_after' => $request->nilai,
            'created_at' => $created->created_at,
            'updated_at' => now(),
        ]);


        return redirect()->route('guru.tampilkan_nilai', $nilai->nis_siswa)->with('success', 'Nilai berhasil diperbarui');
    }

    public function destroy($id)
    {
        $nilai = NilaiSiswa::findOrFail($id);
        $nilai->delete();

        return redirect()->route('guru.tampilkan_nilai', $nilai->nis_siswa)->with('success', 'Nilai berhasil dihapus');
    }

}
