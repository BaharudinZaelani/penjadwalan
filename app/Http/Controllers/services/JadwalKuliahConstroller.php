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
            if ($request->has('save_to_db') && session()->has('jadwalKuliah')) {
                JadwalKuliah::insert(session("jadwalKuliah"));
            }
            if (isset($request->semester)) {
                $semesterCount = $request->semester == "all" ? Semester::count() : 1;
                $jadwalKuliah = $gen->getResult($semesterCount);
                $dataToInsert = collect($jadwalKuliah)->flatten(1)->all();
                session(['jadwalKuliah' => $dataToInsert]);
                return back()->with("success", "Generate Jadwal Kuliah success !");
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
