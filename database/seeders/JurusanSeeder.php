<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jurusan::factory(1)->create([ // 0
            "nama_idn" => "Sistem Informasi",
            "nama_en" => "Information System",
        ]);
        Jurusan::factory(1)->create([ // 1
            "nama_idn" => "Desain Grafis",
            "nama_en" => "Desain Grafis",
        ]);
        Jurusan::factory(1)->create([ // 2
            "nama_idn" => "Ilmu Komunikasi",
            "nama_en" => "Ilmu Komunikasi",
        ]);
        Jurusan::factory(1)->create([ // 3A 
            "nama_idn" => "Akuntansi",
            "nama_en" => "Akuntansi",
        ]);
        Jurusan::factory(1)->create([ // 4
            "nama_idn" => "Administrasi Bisnis",
            "nama_en" => "Administrasi Bisnis",
        ]);
        Jurusan::factory(1)->create([ // 5
            "nama_idn" => "Manajemen",
            "nama_en" => "Manajemen",
        ]);
    }
}
