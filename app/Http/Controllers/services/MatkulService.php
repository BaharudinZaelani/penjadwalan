<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use App\Interface\CRUDInterface;
use Exception;
use Illuminate\Http\Request;

class MatkulService extends Controller implements CRUDInterface
{
    function insert(Request $request)
    {
        try {
            $this->mataKuliah::create($request->except("_token"));
            return back()->with("success", "Data berhasil ditambahkan ...");
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
