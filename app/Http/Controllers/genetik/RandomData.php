<?php

namespace App\Http\Controllers\genetik;

use App\Models\MataKuliah;
use App\Models\Ruangan;
use App\Models\Waktu;
use Exception;

class RandomData
{
    static function dummyData()
    {
        return [
            [
                "id" => 6,
                "ruangan_id" => "Ruangan .53",
                "hari" => "kamis",
                "waktu_id" => "08:00 - 10:00",
                "matkul_id" => "Hyman Kihn Sr.",
                "semester_id" => 1
            ],
            [
                "id" => 8,
                "ruangan_id" => "Ruangan .29",
                "hari" => "jumat",
                "waktu_id" => "08:00 - 10:00",
                "matkul_id" => "Ms. Kassandra Torphy",
                "semester_id" => 1
            ],
            [
                "id" => 9,
                "ruangan_id" => "Ruangan .1",
                "hari" => "kamis",
                "waktu_id" => "10:00 - 12:00",
                "matkul_id" => "Dr. Eliane Kirlin",
                "semester_id" => 1
            ],
            [
                "id" => 10,
                "ruangan_id" => "Ruangan .1",
                "hari" => "rabu",
                "waktu_id" => "08:00 - 10:00",
                "matkul_id" => "Erika Nitzsche",
                "semester_id" => 1
            ],
            [
                "id" => 12,
                "ruangan_id" => "Ruangan .83",
                "hari" => "senin",
                "waktu_id" => "10:00 - 12:00",
                "matkul_id" => "Janiya Schaefer",
                "semester_id" => 1
            ],
            [
                "id" => 13,
                "ruangan_id" => "Ruangan .30",
                "hari" => "selasa",
                "waktu_id" => "10:00 - 12:00",
                "matkul_id" => "Gwendolyn Hodkiewicz",
                "semester_id" => 1
            ],
            [
                "id" => 14,
                "ruangan_id" => "Ruangan .60",
                "hari" => "jumat",
                "waktu_id" => "10:00 - 12:00",
                "matkul_id" => "Dr. Brent Ferry",
                "semester_id" => 1
            ],
            [
                "id" => 17,
                "ruangan_id" => "Ruangan .62",
                "hari" => "kamis",
                "waktu_id" => "10:00 - 12:00",
                "matkul_id" => "Mrs. Cecelia Rau V",
                "semester_id" => 1
            ],
            [
                "id" => 18,
                "ruangan_id" => "Ruangan .43",
                "hari" => "rabu",
                "waktu_id" => "10:00 - 12:00",
                "matkul_id" => "Brittany Boyer I",
                "semester_id" => 1
            ],
            [
                "id" => 20,
                "ruangan_id" => "Ruangan .97",
                "hari" => "kamis",
                "waktu_id" => "19:00 - 21:00",
                "matkul_id" => "Jaycee McCullough",
                "semester_id" => 1
            ]
        ];
    }

    static function randomPopulasi(MataKuliah $mataKuliah, Waktu $waktu, Ruangan $ruangan): array
    {
        $matakuliah = $mataKuliah::where("status", true)->get();
        $populasi = [];
        foreach ($matakuliah as $row) {
            $populasi[] = [
                "id" => $row->id,
                "ruangan_id" => RandomData::randomRuangan($ruangan),
                "hari" => RandomData::randomHari(),
                "waktu_id" => RandomData::randomWaktu($waktu),
                "matkul_id" => $row->id,
                "semester_id" => 1
            ];
        }
        return $populasi;
    }
    private static function randomHari(): string
    {
        $hari = ["senin", "selasa", "rabu", "kamis", "jumat"];
        return $hari[rand(0, count($hari) - 1)];
    }

    private static function randomWaktu(Waktu $waktu): int
    {
        $dataWaktu = $waktu::where("status", true)->get()->toArray();
        $randomID = rand(0, count($dataWaktu) - 1);
        return $dataWaktu[$randomID]["id"];
    }

    private static function randomRuangan(Ruangan $ruangan): int
    {
        $dataRuangan = $ruangan::where("status", true)->get()->toArray();
        if (empty($dataRuangan)) {
            throw new Exception("Ruangan Kosong !");
            return 0;
        }
        return $dataRuangan[rand(0, count($dataRuangan) - 1)]["id"];
    }
}
