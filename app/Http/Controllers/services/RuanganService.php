<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use App\Interface\CRUDInterface;
use Illuminate\Http\Request;

class RuanganService extends Controller implements CRUDInterface
{
    function insert(Request $request)
    {
        try {
            $this->ruangan->create($request->except("_token"));
            return redirect(route("ruangan-index"))->with("success", "Data berhasil ditambahkan");
        } catch (\Exception $e) {
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
