<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Dosen;
use App\Models\Gedung;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Ruangan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Bahar Dev',
            'email' => 'bahar32harz@gmail.com',
            'password' => Hash::make("admin123")
        ]);
        Dosen::factory(10)->create();
        Gedung::factory(10)->create();
        Ruangan::factory(10)->create();
        Jurusan::factory(10)->create();
        Kelas::factory(10)->create();
    }
}
