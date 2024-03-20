<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Dosen;
use App\Models\Gedung;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Kurikulum;
use App\Models\MataKuliah;
use App\Models\Ruangan;
use App\Models\Waktu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Bahar Dev',
            'email' => 'bahar32harz@gmail.com',
            'password' => Hash::make("admin123")
        ]);
        Dosen::factory(10)->create();
        Gedung::factory(10)->create([
            "status" => true
        ]);
        Ruangan::factory(5)->create([
            "status" => true
        ]);

        // Jurusan
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
        Kelas::factory(3)->create();

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

        Kurikulum::create([
            "nama" => "KM 2020",
            "status" => true
        ]);

        // Matakuliah
        // MataKuliah::factory(15)->create();
    }
}
