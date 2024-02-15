<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Gedung;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    function __construct(
        protected $dosen = new Dosen(),
        protected $gedung = new Gedung()
    ) {
    }
}
