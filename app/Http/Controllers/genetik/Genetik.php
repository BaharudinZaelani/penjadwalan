<?php

namespace App\Http\Controllers\genetik;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use App\Models\Semester;
use PowerComponents\LivewirePowerGrid\Components\Filters\Builders\Select;

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

    static function reGenerated(array $data): array
    {
        $result = $data;
        foreach ($data as $key => $dataAwal) {
            $populasiTerbaik = Selection::tournamentSelection(population: $dataAwal);
            $cros = Selection::crossover($populasiTerbaik)[0];
            if (Fitness::calculateFitness($cros['data'])) {
                // dump($cros);
                $result[$key][$cros['index']] = $cros['data'][0];
                break;
            }
        }
        // dd($result);
        return $result;
    }

    static function sortData(array $data): array
    {
        $jadwal = array_reduce($data, function ($carry, $item) {
            $semesterId = $item['semester_id'];
            $carry[$semesterId - 1][] = $item;
            return $carry;
        }, []);
        ksort($jadwal);
        return $jadwal;
    }

    public function getDBData(array $jadwal): array
    {
        foreach ($jadwal as $key => &$row) {
            foreach ($row as &$jw) {
                $jw['ruangan'] = $this->ruangan::where("id", $jw['ruangan_id'])->first()->toArray();
                $jw['waktu'] = $this->waktu::where("id", $jw['waktu_id'])->first()->toArray();
                $jw['matkul'] = $this->mataKuliah::where("id", $jw['matkul_id'])->first()->toArray();
                $jw['semester'] = $this->semester::where("id", $jw['semester_id'])->first()->toArray();
            }
            $fitness = Fitness::calculateFitness($row);
            $bentork = Fitness::countConflict($row);
            $row["fitness"] = $fitness;
            $row["bentrok"] = $bentork;
            $row['semester'] = Semester::find($key + 1)->first()->toArray();
        }
        unset($row, $jw); // menghapus referensi terakhir
        return $jadwal;
    }
}
