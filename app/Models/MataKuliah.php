<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function jurusan()
    {
        return $this->hasOne(Jurusan::class, "id", "jurusan_id");
    }
}
