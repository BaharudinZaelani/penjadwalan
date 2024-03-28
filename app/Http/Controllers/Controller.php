<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Gedung;
use App\Models\JadwalKuliah;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Kurikulum;
use App\Models\MataKuliah;
use App\Models\Ruangan;
use App\Models\Semester;
use App\Models\Waktu;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct(
        protected Dosen $dosen,
        protected Gedung $gedung,
        protected Ruangan $ruangan,
        protected Kelas $kelas,
        protected Jurusan $jurusan,
        protected Kurikulum $kurikulum,
        protected MataKuliah $mataKuliah,
        protected Waktu $waktu,
        protected Semester $semester,
        protected JadwalKuliah $jadwalKuliah
    ) {
    }
}
