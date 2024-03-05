<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use App\Interface\CRUDInterface;
use Illuminate\Http\Request;

class JurusanService extends Controller implements CRUDInterface
{
    function insert(Request $request)
    {
        try {
            $this->jurusan->create($request->except("_token"));
            return redirect(route("jurusan-index"))->with("success", "Data berhasil ditambahkan.");
        } catch (\Exception $e) {
            return back()->with("danger", $e->getMessage());
        }
    }
    function delete($id)
    {
        try {
            $this->jurusan->destroy($id);
            return redirect(route("jurusan-index"))->with("success", "Data berhasil dihapus.");
        } catch (\Exception $e) {
            return back()->with("danger", $e->getMessage());
        }
    }
    function update(Request $request)
    {
    }
}
