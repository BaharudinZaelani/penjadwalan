<?php

namespace App\Livewire;

use App\Models\JadwalKuliah;
use App\Models\Ruangan;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class JadwalKuliahTable extends PowerGridComponent
{
    use WithExport;
    public string $primaryKey = 'jadwal_kuliahs.id';
    public string $sortField = 'jadwal_kuliahs.id';
    public string $exportField = 'jadwal_kuliahs.id';

    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        $query = JadwalKuliah::query()
            ->join('ruangans', 'jadwal_kuliahs.ruangan_id', '=', 'ruangans.id')
            ->join('waktus', 'jadwal_kuliahs.waktu_id', '=', 'waktus.id')
            ->join('mata_kuliahs', 'jadwal_kuliahs.matkul_id', '=', 'mata_kuliahs.id')
            ->join('semesters', 'jadwal_kuliahs.semester_id', '=', 'semesters.id')
            ->select([
                'jadwal_kuliahs.id as id',
                'ruangans.nama as ruangan',
                DB::raw('CONCAT(waktus.waktu_mulai," : ", waktus.waktu_selesai) as waktu'),
                'mata_kuliahs.nama_id as matakuliah',
                'semesters.nama as semester',
            ]);

        return $query;
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('no', 'id')->sortable(),
            Column::make('ruangan', 'ruangan')->sortable()->searchable(),
            Column::add()->title("Waktu")->field("waktu")->sortable()->searchable(),
            Column::add()->title("Mata Kuliah")->field("matakuliah")->sortable()->searchable(),
            Column::add()->title("Semester")->field("semester")->sortable()->searchable(),
            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(\App\Models\JadwalKuliah $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: ' . $row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
