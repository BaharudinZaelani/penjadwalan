<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 8; $i++) {
            Semester::create([
                "nama" => "SMT " . $i,
                "tahun" => "2024",
                "bilangan" => ($i % 2 == 0) ? "genap" : "Ganjil"
            ]);
        }
    }
}
