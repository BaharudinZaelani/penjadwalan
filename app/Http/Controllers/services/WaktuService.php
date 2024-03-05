<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use App\Interface\CRUDInterface;
use Exception;
use Illuminate\Http\Request;

class WaktuService extends Controller implements CRUDInterface
{
    function insert(Request $request)
    {
        try {
            $this->waktu::create($request->except("_token"));
            return redirect(route("matkul-index"))->with("success", "Data berhasil ditambahkan !");
        } catch (Exception $e) {
            return back()->with("danger", $e->getMessage());
        }
    }
    function update(Request $request)
    {
    }
    function delete($id)
    {
    }

    private function convertWaktu()
    {
    }
}
