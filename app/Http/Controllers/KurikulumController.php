<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    function index()
    {
        return view("dashboard.kurikulum.index");
    }
    function insert()
    {
        return view("dashboard.kurikulum.crud.insert");
    }
}
