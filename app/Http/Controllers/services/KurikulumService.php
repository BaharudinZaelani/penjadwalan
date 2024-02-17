<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use App\Interface\CRUDInterface;
use Exception;
use Illuminate\Http\Request;

class KurikulumService extends Controller implements CRUDInterface
{
    function insert(Request $request)
    {
        try {
            $this->kurikulum->create($request->except("_token"));
            return redirect(route("kurikulum-index"))->with("success", "Data berberhasil ditambahkan.");
        } catch (Exception $e) {
            return back()->with("danger", $e->getMessage());
        }
    }
    function delete($id)
    {
        try {
            $this->kurikulum->destroy($id);
            return redirect(route("kurikulum-index"))->with("success", "Data berberhasil dihapus.");
        } catch (Exception $e) {
            return back()->with("danger", $e->getMessage());
        }
    }
    function update(Request $request)
    {
    }
}
