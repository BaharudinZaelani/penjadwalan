<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use App\Interface\CRUDInterface;
use Illuminate\Http\Request;

class DosenService extends Controller implements CRUDInterface
{
    function insert(Request $request)
    {
        try {
            $this->dosen->create($request->all());
            return redirect(route("dosen-index"))->with("success", "Dosen berhasil ditambahkan.");
        } catch (\Exception $e) {
            return redirect(route("dosen-index"))->with("danger", "Error saat menambah data ! : " . $e->getMessage());
        }
    }

    function update(Request $request)
    {
        try {
            $data = $this->dosen::find($request->id)->first();
            $data->nidn = $request->nidn;
            $data->nama = $request->nama;
            $data->save();
            return redirect(route("dosen-index"))->with("success", "Data Berhasil diubah");
        } catch (\Exception $e) {
            return redirect(route("dosen-index"))->with("danger", $e->getMessage());
        }
    }

    function delete($id)
    {
        try {
            $this->dosen->destroy($id);
            return redirect(route("dosen-index"))->with("success", "Data berhasil dihapus.");
        } catch (\Exception $e) {
            return redirect(route("dosen-index"))->with("danger", "Error saat menghapsu data ! : " . $e->getMessage());
        }
    }
}
