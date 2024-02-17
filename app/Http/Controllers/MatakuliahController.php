<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    function index()
    {
        $dosen = $this->dosen->all();
        $gedung = $this->gedung->all();
        $ruangan = $this->ruangan->all();
        $kelas = $this->kelas->all();
        $jurusan = $this->jurusan->all();
        return view("matkul", compact([
            "dosen",
            "gedung",
            "ruangan",
            "kelas",
            "jurusan"
        ]));
    }
}
