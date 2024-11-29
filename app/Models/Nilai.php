<?php

namespace App\Models;

use App\Models\NilaiSiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';
    protected $fillable = ['nama', 'kkm'];
    public function nilaiSiswa()
    {
        return $this->hasMany(NilaiSiswa::class, 'nilai_id');
    }
}
