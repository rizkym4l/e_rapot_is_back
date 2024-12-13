<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
public function adminStudent(){
    $teachers = Siswa::paginate(5);
       
    foreach ($teachers as $key) {
        $key['akun_id'] =  User::where("id",$key['akun_id'])->get('name')->first();
        $key['kelas_id'] =  Kelas::where("id",$key['kelas_id'])->get('nama_kelas')->first();
   }

    return view("admin.Student.index",["students" => $teachers]);
    
}

public function deleteStudent(){
    
}
}
