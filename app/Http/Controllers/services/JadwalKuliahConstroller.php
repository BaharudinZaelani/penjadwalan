<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use App\Http\Controllers\genetik\Genetik;
use App\Interface\CRUDInterface;
use App\Models\JadwalKuliah;
use App\Models\Semester;
use Exception;
use Illuminate\Http\Request;

class JadwalKuliahConstroller extends Controller
{
    function insert(Request $request, Genetik $gen)
    {
        try {
            if (isset($request->semester)) {
                $semester = 0;
                if ($request->semester == "all") {
                    $semester = count(Semester::all()->toArray());
                } else {
                    $semester = 1;
                }
                $jadwalKuliah = $gen->getResult($semester);
                // insert data
                foreach ($jadwalKuliah as $row) {
                    // child
                    foreach ($row as $child) {
                        $child = new Request($child);
                        JadwalKuliah::create($child->except("id"));
                    }
                }
                return back()->with("success", "Generate Jadwal Kuliah success !.");
            }
        } catch (Exception $e) {
            return back()->with("danger", $e->getMessage());
        }
    }

    function delete($id)
    {
    }

    function update(Request $request)
    {
    }
}
