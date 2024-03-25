<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Seeder;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matkulList = [
            'Bisnis Internasional',
            'Pendidikan Kewarganegaraan',
            'Manajemen Internasional',
            'Manajemen Risiko',
            'Pendidikan Pancasila',
            'Metodologi Penelitian Bisnis',
            'Pemasaran Stratejik',
            'Ekonomi Manajerial',
            'TOEFL',
            'Statistika 2',
            'Koperasi Dan UKM',
            'Metode Penelitian',
            'Statistika Praktikum',
            'Penganggaran',
            'Metode Penelitian',
            'Statistika 2',
            'TOEFL',
            'Manajemen Stratejik',
            'E-Commerce',
            'Manajemen Stratejik',
            'Manajemen Proyek',
            'Peramalan Bisnis',
            'Sistem Pengendalian Manajemen',
            'Perilaku Konsumen'
        ];

        foreach ($matkulList as $matkul) {
            MataKuliah::create([
                "kode_kurikulum" => "1",
                "nama_id" => $matkul,
                "nama_en" => "",
                "status" => true,
                "jurusan_id" => 4
            ]);
        }
    }
}
