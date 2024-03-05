<?php

namespace App\Livewire;

use App\Models\Waktu;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class WaktuTable extends PowerGridComponent
{
    use WithExport;

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
        return Waktu::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields();
    }

    public function columns(): array
    {
        return [
            Column::action('')->visibleInExport(false),
            Column::add()
                ->title('status')
                ->field('status')
                ->toggleable(true, 'YA', 'TIDAK')
                ->contentClassField("bg-indigo-100")->visibleInExport(false),

            Column::add()
                ->title("waktu_mulai")
                ->field("waktu_mulai")
                ->editOnClick(hasPermission: true, saveOnMouseOut: true)
                ->sortable(),

            Column::add()
                ->title("waktu_selesai")
                ->field("waktu_selesai")
                ->editOnClick(hasPermission: true, saveOnMouseOut: true)
                ->sortable(),

        ];
    }

    #[\Livewire\Attributes\On('delete')]
    public function delete($rowId): void
    {
        Waktu::destroy($rowId);
    }

    public function filters(): array
    {
        return [];
    }
    public function onUpdatedEditable(string|int $id, string $field, string $value): void
    {
        Waktu::query()->find($id)->update([
            $field => $value
        ]);
    }

    public function onUpdatedToggleable(string $id, string $field, string $value): void
    {
        Waktu::query()->find($id)->update([
            $field => $value
        ]);
    }

    public function actions(Waktu $row): array
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
