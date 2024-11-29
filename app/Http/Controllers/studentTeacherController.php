<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class studentTeacherController extends Controller
{
    public function index()
    {
        $teachers = Guru::all();
        $siswa = Siswa::all();

        return view();
    }
}
