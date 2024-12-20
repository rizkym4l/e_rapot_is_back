<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama_lengkap',
        'akun_id',
        'photo',
        'kelas_id',
        'tingkat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'akun_id');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
