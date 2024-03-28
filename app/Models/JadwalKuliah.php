<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKuliah extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    function ruangan()
    {
        return $this->hasOne(Ruangan::class, "id", "ruangan_id");
    }

    function waktu()
    {
        return $this->hasOne(Waktu::class, "id", "waktu_id");
    }

    function matkul()
    {
        return $this->hasOne(MataKuliah::class, "id", "matkul_id");
    }
}
