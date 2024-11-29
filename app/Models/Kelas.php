<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'tingkat'
    ];

    public function guruKelasMapel()
    {
        return $this->hasMany(GuruMapelKelas::class, 'kelas_id');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id');
    }

    public function guru()
    {
        return $this->belongsToMany(Guru::class, 'guru_kelas_mapel', 'kelas_id', 'guru_id');
    }
}
