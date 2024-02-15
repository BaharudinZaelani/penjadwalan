<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use App\Interface\CRUDInterface;
use Illuminate\Http\Request;

class DosenService extends Controller implements CRUDInterface
{
    // View
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

    // Services
    function insert(Request $request)
    {
        try {
            $this->dosen->create($request->all());
            return redirect(route("dosen-index"))->with("success", "Dosen berhasil ditambahkan.");
        } catch (\Exception $e) {
            return back()->with("danger", "Error saat menambah data ! : " . $e->getMessage());
        }
    }

    function update(Request $request)
    {
        try {
            $data = $this->dosen::find($request->id)->first();
            $data->nidn = $request->nidn;
            $data->nama = $request->nama;
            $data->save();
            return back()->with("success", "Data Berhasil diubah");
        } catch (\Exception $e) {
            return back()->with("danger", $e->getMessage());
        }
    }

    function delete($id)
    {
        try {
            $this->dosen->destroy($id);
            return back()->with("success", "Data berhasil dihapus.");
        } catch (\Exception $e) {
            return back()->with("danger", "Error saat menghapsu data ! : " . $e->getMessage());
        }
    }

    function getAll()
    {
    }

    function getByid($id)
    {
    }
}
