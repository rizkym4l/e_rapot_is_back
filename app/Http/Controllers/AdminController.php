<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    // USER INI USER INI USER INI USER
    // USER INI USER INI USER INI USER
    // USER INI USER INI USER INI USER

    public function indexusers(Request $request)
    {
        $search = $request->input('search');

        $user = User::where('name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")

            ->paginate(5);
        return view('admin.Users.users', ['users' => $user]);
    }

    public function create()
    {
        return view('admin.Users.addUsers');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $photoPath;
        }

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

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
