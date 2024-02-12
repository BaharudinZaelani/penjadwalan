<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    function index()
    {
        return view("dashboard.kelas.index");
    }
}
