<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GedungController extends Controller
{
    function index()
    {
        return view("dashboard.gedung.index");
    }
}
