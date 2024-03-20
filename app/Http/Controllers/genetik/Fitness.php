<?php

namespace App\Http\Controllers\genetik;

class Fitness
{
    static function calculateFitness(array $data): float
    {
        $fitness = 0.0;

        // Hitung jumlah konflik jadwal
        $konflikJadwal = self::countConflict($data);

        // Hitung nilai fitness
        $fitness = 1.0 / ($konflikJadwal + 1.0);

        return $fitness;
    }
    static function countConflict(array $data): int
    {
        $jadwalBentrok = 0;

        // Loop melalui setiap jadwal
        for ($i = 0; $i < count($data); $i++) {
            $currentJadwal = $data[$i];

            // Loop melalui jadwal-jadwal selanjutnya
            for ($j = $i + 1; $j < count($data); $j++) {
                $otherJadwal = $data[$j];

                // Memeriksa apakah hari dan waktu sama
                if ($currentJadwal['hari'] === $otherJadwal['hari'] && $currentJadwal['waktu_id'] === $otherJadwal['waktu_id']) {
                    // Memeriksa apakah ruangan sama
                    if ($currentJadwal['ruangan_id'] === $otherJadwal['ruangan_id']) {
                        $jadwalBentrok++; // Ruangan berbeda, ada bentrok
                    }
                }
            }
        }

        return $jadwalBentrok;
    }
}
