<?php

namespace App\Http\Controllers\genetik;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;

class Genetik extends Controller
{
    function getResult($semester = 10): array
    {
        $jadwalKuliah = [];
        for ($i = 0; $i < $semester; $i++) {
            $jadwalKuliah[] = RandomData::randomPopulasi(
                mataKuliah: $this->mataKuliah,
                ruangan: $this->ruangan,
                waktu: $this->waktu
            );
        }

        // Populasi
        $populasiAwal = [];
        for ($i = 0; $i < env("MAX_GENERASI"); $i++) {
            $populasiAwal[] = RandomData::randomPopulasi(
                mataKuliah: $this->mataKuliah,
                ruangan: $this->ruangan,
                waktu: $this->waktu
            );
        }


        // Iterasi 
        for ($i = 0; $i < $semester; $i++) {
            // Selection
            $populasiTerbaik = Selection::tournamentSelection(population: $populasiAwal);

            // Crossover / Rekombinasi
            $crossoverData = Selection::crossover($populasiTerbaik)[0];
            $populasiTerbaik[$crossoverData["index"]] = $crossoverData;
            foreach ($populasiTerbaik as $row) {
                if (isset($row["fitness"]) && $row["fitness"] >= 1) {
                    for ($smt = 0; $smt < $semester; $smt++) {
                        $jadwalKuliah[$row['index']] = $row['data'];
                    }
                    break;
                }
            }
        }
        return $jadwalKuliah;
    }
}
