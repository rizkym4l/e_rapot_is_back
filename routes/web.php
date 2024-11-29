<?php

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use App\Models\NilaiHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\historyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TingkatanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('/', 'login')->name('login');
    Route::post('/', 'loginAction')->name('login.action');

});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/siswa/cetak-nilai/{nis}', [NilaiController::class, 'cetak'])->name('siswa.cetak-nilai');
    Route::post('/profile/upload', [ProfileController::class, 'uploadImage'])->name('profile.upload');
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::get('/error', function () {
        return view('error');
    })->name('error');
    Route::middleware('checkRole:siswa')->group(function () {
        Route::get('dashboard', function () {
            $history = NilaiHistory::with('nilaiSiswa', 'user')->latest()->take(5)->get();
            // dd($history);
            $nama = Siswa::where('akun_id', Auth::user()->id)->get();
            return view('dashboard', ['nama' => $nama[0]['nama_lengkap'], 'nilaiHistory' => $history]);
        })->name('dashboard');
        Route::get('/nilai/siswa/{tingkat}/{semester}', [NilaiController::class, 'index']);
        Route::get('nilai/{id}/history', [NilaiController::class, 'history'])->name('nilai.history');


    });
    Route::get('/etdah', function () {
        $totalGuru = Guru::count();
        $totalSiswa = Siswa::count();
        $totalUser = User::count();
        $totalHistory = NilaiHistory::count();

        return view('admin.dashboard', [
            'totalGuru' => $totalGuru,
            'totalSiswa' => $totalSiswa,
            'totalUser' => $totalUser,
            'totalHistory' => $totalHistory,
        ]);
    })->name('admin.dashboard');

    Route::middleware('checkRole:guru')->group(function () {
        Route::post('/nilai/import/', [NilaiController::class, 'import'])->name('nilai.import');
        Route::get('/nilai/{siswa_id}', [NilaiController::class, 'index'])->name('nilai.index');
        Route::get('/nilai/edit/{id}', [NilaiController::class, 'edit'])->name('nilai.edit');
        Route::put('/nilai/{id}', [NilaiController::class, 'update'])->name('nilai.update');
        Route::delete('/nilai/destroy/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
        Route::get('/perbaikan', [GuruController::class, 'pilihkelas'])->name('perbaikan');
        Route::get('guru/kelas/{kelas_id}', [GuruController::class, 'pilihsiswa'])->name('guru.showStudents');
        Route::get('guru/siswa/{nis}', [GuruController::class, 'tampilkanNilai'])->name('guru.tampilkan_nilai');
        Route::get('/index', [GuruController::class, 'index'])->name('guru.index');
        Route::get('/export', [NilaiController::class, 'export'])->name('nilai.sport');
        Route::post('/nilai/store', [NilaiController::class, 'store'])->name('nilai.store');
        Route::get('/tingkatan', [TingkatanController::class, 'index'])->name('tingkatan');
        Route::get('/kelas/{tingkatan}', [TingkatanController::class, 'kelas']);
        Route::get('/mapel/{tingkatan}/{kelas}', [MapelController::class, 'index']);
        Route::get('/semester/{tingkat}/{kelas}/{mapel}', [NilaiController::class, 'semester']);
        Route::get('/nama/{tingkat}/{kelas}/{mapel}/{semester}', [NilaiController::class, 'nilai']);
        Route::get('/fetch/nilai/{nis}', [NilaiController::class, 'fetchNilai']);
        Route::get('/nilai/create/{tingkat}/{kelas}/{mapel}/{semester}/{nilai}', [NilaiController::class, 'create'])->name('nilai.create');
    });
});
Route::middleware('checkRole:admin')->group(function () {
    Route::get('admin/users', [AdminController::class, 'indexUsers'])->name(name: 'admin.users');
    Route::get('admin/users/create', [AdminController::class, 'create'])->name(name: 'users.create');
    Route::post('admin/users/store', [AdminController::class, 'store'])->name('users.store');
    Route::get('admin/users/edit/{id}', [AdminController::class, 'edit'])->name('users.edit');

    Route::get('kelas/', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('kelas/search', [KelasController::class, 'search'])->name('kelas.search');
    Route::get('kelas/create/asdasda', [KelasController::class, 'create'])->name('kelas.create');
    Route::get('kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::post('kelas/store', [KelasController::class, 'store'])->name('kelas.store');
    Route::delete('kelas/destroy/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
    Route::put('kelas/update/{id}', [KelasController::class, 'update'])->name('kelas.update');

    Route::put('admin/users/update/{id}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('admin/users/delete/{id}', [AdminController::class, 'deleteUsers'])->name('users.destroy');

    Route::get('admin/history', [historyController::class, 'index'])->name('index.history');
    Route::post('/revert-change/{id}', [historyController::class, 'revertChange'])->name('revert.change');
    Route::get('/download-report', [historyController::class, 'downloadReport'])->name('download.report');


});

Route::fallback(function () {
    return redirect()->route('error');
});
