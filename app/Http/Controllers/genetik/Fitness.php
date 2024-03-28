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
    static function countConflict($jadwal)
    {
        $conflicts = 0;
        $checked = []; // Array untuk menyimpan jadwal yang sudah diperiksa

        foreach ($jadwal as $key1 => $schedule1) {
            foreach ($jadwal as $key2 => $schedule2) {
                if (!in_array($key1, $checked) && !in_array($key2, $checked) && $key1 != $key2) {
                    if (
                        $schedule1['hari'] == $schedule2['hari'] &&
                        $schedule1['waktu_id'] == $schedule2['waktu_id']
                    ) {
                        if ($schedule1['ruangan_id'] == $schedule2['ruangan_id']) {
                            $conflicts++;
                        }
                    }
                }
            }
            $checked[] = $key1;
        }
        return $conflicts;
    }
}
