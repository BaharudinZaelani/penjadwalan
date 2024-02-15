<?php

namespace App\Interface;

use Illuminate\Http\Request;

interface CRUDInterface
{
    function insert(Request $request);
    function update(Request $request);
    function delete($id);
    function getAll();
    function getById($id);
}
