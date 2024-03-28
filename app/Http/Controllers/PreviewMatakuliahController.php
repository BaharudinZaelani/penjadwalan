<?php

namespace App\Http\Controllers;

use App\Http\Controllers\genetik\Fitness;
use App\Http\Controllers\genetik\Genetik;
use App\Http\Controllers\genetik\RandomData;
use App\Models\JadwalKuliah;
use App\Models\Semester;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;

class PreviewMatakuliahController extends Controller
{
    //
    function index(Genetik $gen)
    {
        // mengambil Jadwal Session
        $waktu = $this->waktu->all();
        $semester = $this->semester->all();
        $jadwal = session("jadwalKuliah") !== null ? session('jadwalKuliah') : [];
        $jadwal = Genetik::sortData($jadwal);
        $jadwal = $gen->getDBData($jadwal);
        return view("matkul.preview.index", compact(
            "waktu",
            "semester",
            "jadwal",
        ));
    }
}
