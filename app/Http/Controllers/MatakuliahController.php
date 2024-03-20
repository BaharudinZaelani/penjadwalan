<?php

namespace App\Http\Controllers;

use App\Http\Controllers\genetik\Genetik;

class MatakuliahController extends Controller
{
    function index()
    {
        $dosen = $this->dosen->all();
        $gedung = $this->gedung->where("status", true)->get();
        $ruangan = $this->ruangan->where("status", true)->get();
        $kelas = $this->kelas->where("status", true)->get();
        $jurusan = $this->jurusan->where("status", true)->get();
        $kurikulum = $this->kurikulum->where("status", true)->get();
        $semester = $this->semester->all();

        return view("matkul", compact([
            "dosen",
            "gedung",
            "ruangan",
            "kelas",
            "jurusan",
            "kurikulum",
            "semester"
        ]));
    }
}
