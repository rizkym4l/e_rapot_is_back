<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminController extends Controller
{

    // USER INI USER INI USER INI USER
    // USER INI USER INI USER INI USER
    // USER INI USER INI USER INI USER

    public function indexusers(Request $request)
{
    // Pencarian data pada model User
    $search = $request->input('search');
    $user = User::where('name', 'like', "%{$search}%")
        ->orWhere('email', 'like', "%{$search}%")
        ->paginate(5);

    // Ambil semua data siswa dan guru
    $siswa = Siswa::all();
    $guru = Guru::all();

    // Gabungkan data siswa dan guru
    $data = $siswa->merge($guru);

    // Paginasi manual pada data gabungan siswa dan guru
    $currentPage = $request->input('page', 1); // Halaman saat ini
    $perPage = 5; // Jumlah item per halaman

    $paginatedData = new LengthAwarePaginator(
        $data->slice(($currentPage - 1) * $perPage, $perPage)->values(),
        $data->count(),
        $perPage,
        $currentPage,
        ['path' => $request->url(), 'query' => $request->query()]
    );
    // dd($paginatedData);

    // Kirim data ke view
    return view('admin.Users.users', [
        'users' => $user,
        'teachersStudents' => $paginatedData
    ]);
}

    public function create()
    {
        return view('admin.Users.addUsers');
    }
    public function store(Request $request)
    {

        // dd($request->all());    
        // die();
    $validateduser = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);
    if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validateduser['photo'] = $photoPath;
    }

    $validateduser['password'] = Hash::make($validateduser['password']);
    $validateduser['user'] =$request['username'] ;

    User::create($validateduser);

    $latestUser = User::latest()->first();
    // dd($latestUser);
    // die();
        

    if ($request->filled('kelas_id') || $request->filled('tingkat')) {
    // Logika untuk menyimpan data sebagai Siswa
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'nis_nipk' => 'required|string|max:255|unique:siswa,nis',
        'kelas_id' => 'required|integer',
        'tingkat' => 'required|integer',
    ]);
    $validatedData['nis'] = $request['nis_nipk'] ;
    $validatedData['photo'] = '' ;
    $validatedData['nama_lengkap'] = $request['name'] ;
    $validatedData['akun_id'] = $latestUser->id;


  
    Siswa::create($validatedData);
    } elseif ($request->filled('mapel_id')) {
    // Logika untuk menyimpan data sebagai Guru
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'nis_nipk' => 'required|string|max:255|unique:guru,nis',
        'mapel_id' => 'required|integer',
    ]);

    // Jika ada file foto, simpan di storage
    if ($request->hasFile('photo')) {
        $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
    }
    $validatedData['photo'] = '' ;
    $validatedData['akun_id'] = $latestUser->id;

    $validatedData['nama_lengkap'] = $request['name'] ;

    $validatedData['nipk'] = $request['nis_nipk'] ;
    Guru::create($validatedData);
    } else {
    return back()->withErrors([
        'error' => 'Please fill in the required fields for either Siswa or Guru.',
    ]);
    }
        return redirect()->route('admin.users')->with('success', 'User added successfully!');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.Users.editUsers', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
            'password' => $validatedData['password'] ? Hash::make($validatedData['password']) : $user->password,
        ]);

        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }

    public function deleteUsers($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('admin.users')->with('error', 'Akun ini sudah memiliki nilai aktif dan tidak bisa dihapus.');
            }

            return redirect()->route('admin.users')->with('error', 'Terjadi kesalahan saat menghapus user.');
        }
    }


    // USER END INI USER INI USER INI USER
    // USER END INI USER INI USER INI USER
    // USER END INI USER INI USER INI USER





}
