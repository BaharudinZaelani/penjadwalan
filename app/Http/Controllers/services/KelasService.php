<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use App\Interface\CRUDInterface;
use Illuminate\Http\Request;

class KelasService extends Controller implements CRUDInterface
{
    function insert(Request $request)
    {
        try {
            $this->kelas->create($request->except("_token"));
            return redirect(route("kelas-index"))->with("success", "Data berhasil ditambahkan.");
        } catch (\Exception $e) {
            return back()->with("danger", $e->getMessage());
        }
    }
    function delete($id)
    {
        try {
            $this->kelas->delete($id);
            return redirect(route("kelas-index"))->with("success", "Data berhasil dihapus.");
        } catch (\Exception $e) {
            return back()->with("danger", $e->getMessage());
        }
    }
    function update(Request $request)
    {
    }
}
