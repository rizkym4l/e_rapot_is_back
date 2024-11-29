<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $fillable = ['nipk', 'nama_lengkap', 'akun_id', 'mapel_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'akun_id');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    public function guruKelasMapel()
    {
        return $this->hasMany(GuruMapelKelas::class, 'guru_id');
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'guru_kelas_mapel', 'guru_id', 'kelas_id');
    }
}
