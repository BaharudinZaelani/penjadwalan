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
        Jurusan::factory(1)->create([
            "nama_idn" => "Sistem Informasi",
            "nama_en" => "Information System",
        ]);
        Jurusan::factory(1)->create([
            "nama_idn" => "Desain Grafis",
            "nama_en" => "Desain Grafis",
        ]);
        Jurusan::factory(1)->create([
            "nama_idn" => "Ilmu Komunikasi",
            "nama_en" => "Ilmu Komunikasi",
        ]);
        Jurusan::factory(1)->create([
            "nama_idn" => "Akuntansi",
            "nama_en" => "Akuntansi",
        ]);
        Jurusan::factory(1)->create([
            "nama_idn" => "Administrasi Bisnis",
            "nama_en" => "Administrasi Bisnis",
        ]);
        Jurusan::factory(1)->create([
            "nama_idn" => "Manajemen",
            "nama_en" => "Manajemen",
        ]);
    }
}
