<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index($tingkat, $kelas)
    {
        $mapel = Mapel::all();

        return view('mapel', ['tingkat' => $tingkat, 'Mapel' => $mapel, 'kelas' => $kelas]);
    }
}
