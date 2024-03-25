<?php

namespace Database\Seeders;

use App\Models\Gedung;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gedung::factory(1)->create([
            "status" => true,
            "nama" => "Gedung IMWI",
            "lantai" => "1"
        ]);
    }
}
