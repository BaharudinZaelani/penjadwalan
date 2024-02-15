<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use App\Interface\CRUDInterface;
use Illuminate\Http\Request;

class GedungService extends Controller implements CRUDInterface
{
    function insert(Request $request)
    {
        try {
            $this->gedung->create($request->except("_token"));
            return redirect(route("gedung-index"))->with("success", "Data Berhasil ditambahkan");
        } catch (\Exception $e) {
            return back()->with("danger", $e->getMessage());
        }
    }
    function delete($id)
    {
        try {
            $this->gedung::destroy($id);
            return redirect(route("gedung-index"))->with("success", "Data Berhasil dihapus");
        } catch (\Exception $e) {
            return back()->with("danger", $e->getMessage());
        }
    }
    function update(Request $request)
    {
        try {
        } catch (\Exception $e) {
            return back()->with("danger", $e->getMessage());
        }
    }
}
