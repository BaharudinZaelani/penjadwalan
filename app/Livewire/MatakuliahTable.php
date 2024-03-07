<?php

namespace App\Livewire;

use App\Models\MataKuliah;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
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

    public function setUp(): array
    {
        return [
            // Exportable::make('export')
            //     ->striped()
            //     ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return MataKuliah::query();
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
            Column::action(''),

            Column::add()
                ->title('status')
                ->field('status')
                ->toggleable(true, 'YA', 'TIDAK')
                ->contentClassField("bg-indigo-100")->visibleInExport(false),

            Column::add()
                ->title("nama ID")
                ->field("nama_id")
                ->editOnClick(hasPermission: true, saveOnMouseOut: true)
                ->sortable(),

            Column::add()
                ->title("Nama EN")
                ->field("nama_en")
                ->editOnClick(hasPermission: true, saveOnMouseOut: true)
                ->sortable(),

            Column::add()
                ->title("dosen")
                ->field("dosen_id")
                ->editOnClick(hasPermission: true, saveOnMouseOut: true)
                ->sortable(),
        ];
    }

    #[\Livewire\Attributes\On('delete')]
    public function delete($rowId): void
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
