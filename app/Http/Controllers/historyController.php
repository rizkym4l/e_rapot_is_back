<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\NilaiSiswa;
use App\Models\NilaiHistory;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\FlareClient\Http\Response;

class historyController extends Controller
{

    public function revertChange(Request $request, $id)
    {
        $history = NilaiHistory::findOrFail($id);
        $nilaiSiswa = NilaiSiswa::findOrFail($history->nilai_siswa_id);

        $nilaiSiswa->nilai = $history->nilai_before;
        $nilaiSiswa->save();

        return response()->json(['success' => true]);
    }


    public function downloadReport(Request $request)
    {
        $year = $request->query('year');
        $month = $request->query('month');

        // Mengambil data dari NilaiHistory yang created_at-nya sesuai dengan tahun dan bulan yang dipilih
        $reportData = NilaiHistory::with([
            'nilaiSiswa.mapel',           // Relasi ke mata pelajaran
            'nilaiSiswa.tahunAjaran',     // Relasi ke tahun ajaran
            'siswa',
            'user'                        // Relasi ke user yang mengubah data
        ])
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();

        // dd($reportData[0]);

        $pdf = PDF::loadView('admin.history.monthly_report', [
            'reportData' => $reportData,
            'year' => $year,
            'month' => Carbon::create()->month($month)->format('F')
        ]);

        $fileName = "Report_{$year}_{$month}.pdf";

        // Return PDF sebagai download response
        return $pdf->download($fileName);
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $historyQuery = NilaiHistory::with([
            'nilaiSiswa.mapel',           // Relasi ke mata pelajaran
            'nilaiSiswa.tahunAjaran',     // Relasi ke tahun ajaran
            'siswa',
            'user'                        // Relasi ke user yang mengubah data
        ])
            ->when($search, function ($query) use ($search) {
                $query->whereHas('siswa', function ($q) use ($search) {
                    $q->where('nama_lengkap', 'like', '%' . $search . '%');
                })->orWhereHas('nilaiSiswa.mapel', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%');
                });
            });

        if ($request->input('sort') === 'latest') {
            $historyQuery->orderBy('created_at', 'desc');
        }


        $history = $historyQuery->paginate(10);

        // dd($history);

        return view('admin.history.index', compact('history'));
    }



}
