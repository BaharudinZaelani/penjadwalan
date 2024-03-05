<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    function insertView()
    {
        $year = Carbon::now()->year;
        return view("dashboard.semester.crud.insert", compact("year"));
    }
}
