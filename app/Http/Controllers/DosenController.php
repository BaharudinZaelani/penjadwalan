<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        return view("dashboard.dosen.index");
    }
    function insertView()
    {
        return view("dashboard.dosen.crud.insert");
    }
    function updateView($id)
    {
        try {
            $data = $this->dosen::find($id)->first();
            return view("dashboard.dosen.crud.update", [
                "data" => $data
            ]);
        } catch (\Exception $e) {
            return back()->with("danger", $e->getMessage());
        }
    }
}
