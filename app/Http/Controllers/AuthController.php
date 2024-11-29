<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }
    public function registerSave(Request $request)
    {
        Validator::make($request->all(), ['name' => 'required', 'email' => 'required|email', 'password' => 'required|confirmed'])->validate();
        User::create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password), 'level' => 'Admin']);
        return redirect()->route('login');
    }
    public function login()
    {
        return view('auth/login');
    }
    public function loginAction(Request $request)
    {
        $request->validate([
            'name' => 'required', // Ubah dari 'email' ke 'name'
            'password' => 'required',
        ]);

        // Gunakan name dan password untuk otentikasi
        $credentials = ['name' => $request->name, 'password' => $request->password];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $user = Auth::user();

            // Redirect sesuai dengan role
            if ($user->role == 'guru') {
                return redirect()->route('guru.index');
            } elseif ($user->role == 'siswa') {
                return redirect()->route('dashboard');
            } elseif ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }
        } else {
            // Jika otentikasi gagal
            throw ValidationException::withMessages([
                'name' => [trans('auth.failed')],
            ]);
        }
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
    public function profile()
    {
        return view('profile');
    }
}
