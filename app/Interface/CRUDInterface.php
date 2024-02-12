<?php

namespace App\Interface;

use Illuminate\Http\Request;

interface CRUD
{
    function insert(Request $request);
    function update(Request $request);
    function delete($id);
    function getAll();
    function getById($id);
}
