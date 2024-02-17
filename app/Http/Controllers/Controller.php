<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Gedung;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Kurikulum;
use App\Models\Ruangan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    function __construct(
        protected $dosen = new Dosen(),
        protected $gedung = new Gedung(),
        protected $ruangan = new Ruangan(),
        protected $kelas = new Kelas(),
        protected $jurusan = new Jurusan(),
        protected $kurikulum = new Kurikulum(),
    ) {
    }
}
