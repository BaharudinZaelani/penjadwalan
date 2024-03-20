<?php

namespace Database\Seeders;

use App\Models\Waktu;
use Illuminate\Database\Seeder;

class WaktuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Waktu::create([
            "waktu_mulai" => "08:00",
            "waktu_selesai" => "10:00",
        ]);
        Waktu::create([
            "waktu_mulai" => "10:00",
            "waktu_selesai" => "12:00",
        ]);
        Waktu::create([
            "waktu_mulai" => "19:00",
            "waktu_selesai" => "21:00",
        ]);
    }
}
