<?php

namespace App\Livewire;

use App\Models\MataKuliah;
use App\Models\Ruangan;
use App\Models\Semester;
use App\Models\Waktu;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class JadwalDraftTable extends PowerGridComponent
{
    public function datasource(): ?Collection
    {
        $jadwalKuliah = session("jadwalKuliah", []);

        $result = collect($jadwalKuliah)->map(function ($jadwal) {
            $ruangan = Ruangan::find($jadwal['ruangan_id']);
            $waktu = Waktu::find($jadwal['waktu_id']);
            $semester = Semester::find($jadwal['semester_id']);
            $matakuliah = MataKuliah::find($jadwal['matkul_id']);

            return [
                "id" => $jadwal['id'],
                "ruangan" => optional($ruangan)->nama,
                "hari" => $jadwal['hari'],
                "waktu" => optional($waktu)->waktu_mulai . " : " . optional($waktu)->waktu_selesai,
                "semester" => optional($semester)->nama,
                "matkul" => optional($matakuliah)->nama_id
            ];
        });

        return $result->isEmpty() ? null : $result;
    }


    public function setUp(): array
    {
        return [
            // Exportable::make('export')
            //     ->striped()
            //     ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            // Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('ruangan')
            ->add('hari')
            ->add('waktu')
            ->add('matkul')
            ->add('semester');
    }

    public function columns(): array
    {
        return [
            Column::make('ruangan', 'ruangan')->sortable()->searchable(),
            Column::add()->title("Hari")->field("hari")->sortable()->searchable(),
            Column::add()->title("Waktu")->field("waktu")->sortable()->searchable(),
            Column::add()->title("Mata Kuliah")->field("matkul")->sortable()->searchable(),
            Column::add()->title("Semester")->field("semester")->sortable()->searchable(),
        ];
    }
}
