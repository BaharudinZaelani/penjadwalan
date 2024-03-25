<?php

namespace App\Livewire;

use App\Models\MataKuliah;
use Exception;
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

final class MatakuliahTable extends PowerGridComponent
{
    use WithExport;
    public string $primaryKey = "mata_kuliahs.id";
    public string $sortField = 'mata_kuliahs.id';
    public string $exportField = 'mata_kuliahs.id';

    public function setUp(): array
    {
        return [
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return MataKuliah::query()
            ->join('jurusans', 'mata_kuliahs.jurusan_id', '=', 'jurusans.id')
            ->select(
                'mata_kuliahs.id as id',
                'mata_kuliahs.nama_id as nama',
                'mata_kuliahs.status as status',
                'jurusans.nama_idn as jurusan'
            );
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('status')
            ->add('nama')
            ->add('id');
    }

    public function columns(): array
    {
        return [
            Column::action('')->visibleInExport(false),
            Column::make('ID', 'id'),
            Column::add()
                ->title('status')
                ->field('status')
                ->toggleable(true, 'YA', 'TIDAK')
                ->visibleInExport(false),
            Column::add()
                ->title("nama")
                ->field("nama")
                ->editOnClick(hasPermission: true, saveOnMouseOut: true)
                ->sortable(),
            Column::add()->make("jurusan", "jurusan")
        ];
    }

    #[\Livewire\Attributes\On('delete')]
    public function delete(string $rowId): void
    {
        MataKuliah::destroy($rowId);
    }

    public function filters(): array
    {
        return [];
    }
    public function onUpdatedEditable(string|int $id, string $field, string $value): void
    {
        MataKuliah::query()->find($id)->update([
            $field => $value
        ]);
    }

    public function onUpdatedToggleable(string $id, string $field, string $value): void
    {
        MataKuliah::query()->find($id)->update([
            $field => $value
        ]);
    }

    public function actions(MataKuliah $row): array
    {
        return [
            Button::add('hapus')
                ->slot('<i class="fa-solid fa-trash"></i>')
                ->id()
                ->class('px-2 py-1 rounded bg-red-400 text-white')
                ->dispatch('delete', ['rowId' => $row->id]),
        ];
    }
}
