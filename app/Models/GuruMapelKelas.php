<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuruMapelKelas extends Model
{
    use HasFactory;
    protected $table = 'guru_kelas_mapel';

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

}
