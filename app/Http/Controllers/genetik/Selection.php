<?php

namespace App\Http\Controllers\genetik;

class Selection
{
    static function crossover(array $populasiTerbaik): array
    {
        $resultData = [];

        // Jumlah individu terbaik yang akan berpartisipasi dalam crossover
        $jumlahParent = count($populasiTerbaik);

        // Jumlah child yang akan dihasilkan
        $jumlahChild = env("MAX_GENERASI");

        for ($i = 0; $i < $jumlahChild; $i++) {
            // Pilih dua parent acak dari populasi terbaik
            $indexParent1 = rand(0, $jumlahParent - 1);
            $indexParent2 = rand(0, $jumlahParent - 1);

            // Ambil data parent
            $parent1 = $populasiTerbaik[$indexParent1]["data"];
            $parent2 = $populasiTerbaik[$indexParent2]["data"];

            // Tentukan titik pemotongan (crossover point)
            $titikPemotongan = rand(1, count($parent1) - 1);

            // crossover
            $child = array_merge(
                array_slice($parent1, 0, $titikPemotongan),
                array_slice($parent2, $titikPemotongan)
            );

            // Tambahkan child ke hasil crossover
            $resultData[] = [
                "index" => $populasiTerbaik[$indexParent1]["index"],
                "data" => $child
            ];
        }

        return $resultData;
    }


    static function tournamentSelection(array $population): array
    {
        $size = env("TOURNAMENT_SIZE");
        $finalData = [];
        foreach ($population as $key => $row) {
            // Lakukan turnamen
            for ($i = 0; $i < $size; $i++) {
                // Pilih individu acak dari populasi
                $randomIndex = rand(0, count($population) - 1);
                $randomPopulation = $population[$randomIndex];

                // Hitung fitness dari individu acak
                $fitness = Fitness::calculateFitness($randomPopulation);

                // Simpan nilai fitness dan individu jika memenuhi kriteria fitness yang tinggi
                if ($fitness >= env("PROBABILITY_CUTOFF")) {
                    $finalData[$key] = [
                        "index" => $key,
                        "fitness" => $fitness,
                        "data" => $randomPopulation
                    ];
                }
            }
        }

        // Urutkan populasi terbaik berdasarkan nilai fitness secara menurun
        usort($finalData, function ($a, $b) {
            return $b['fitness'] <=> $a['fitness'];
        });

        return $finalData;
    }
}
