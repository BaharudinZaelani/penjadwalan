<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuanganController extends Controller
{
    function index()
    {
        return view("dashboard.ruangan.index");
    }
}
