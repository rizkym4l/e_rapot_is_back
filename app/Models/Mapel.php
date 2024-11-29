<?php

namespace App\Models;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';

    protected $fillable = [
        'nama',
        'kode_mapel'
    ];

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
    public function guru()
    {
        return $this->hasMany(Guru::class, 'mapel_id');
    }

    public function guruKelasMapel()
    {
        return $this->hasMany(GuruMapelKelas::class, 'mapel_id');
    }
}
