<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiHistory extends Model
{
    use HasFactory;
    protected $table = 'nilai_history';
    protected $fillable = ['nilai_siswa_id', 'user_id', 'updated_by', 'nilai_before', 'nilai_after', 'created_at', 'updated_at'];

    public function nilaiSiswa()
    {
        return $this->belongsTo(NilaiSiswa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function siswa()
    {
        return $this->hasOneThrough(
            Siswa::class,       // The final model we want to access
            NilaiSiswa::class,  // The intermediate model
            'id',               // Foreign key on NilaiSiswa table referencing Siswa's NIS
            'nis',              // Foreign key on Siswa table
            'nilai_siswa_id',   // Local key on NilaiHistory table
            'nis_siswa'         // Local key on NilaiSiswa table referencing Siswa's NIS
        );
    }


}
