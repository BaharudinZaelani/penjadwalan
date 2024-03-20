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
}
