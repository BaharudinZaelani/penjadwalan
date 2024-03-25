<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ruangan::factory(1)->create([
            "kode_gedung" => 1,
            "status" => true,
            "nama" => "Ruangan 101"
        ]);

        Ruangan::factory(1)->create([
            "kode_gedung" => 1,
            "status" => true,
            "nama" => "Ruangan 102"
        ]);

        Ruangan::factory(1)->create([
            "kode_gedung" => 1,
            "status" => true,
            "nama" => "Ruangan 103"
        ]);
    }
}
