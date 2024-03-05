<?php

namespace App\Livewire;

use App\Models\Gedung;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class GedungTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $time = time();
        return [
            Exportable::make("[$time]Data Gedung")
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV)
                ->columnWidth([
                    1 => 4,
                    2 => 20,
                    3 => 10,
                    4 => 10,
                    5 => 10,
                    6 => 10,
                    7 => 50,
                ]),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Gedung::query();
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
        $canEdit = true;
        return [
            Column::action('')->visibleInExport(false),
            Column::add()
                ->title('status')
                ->field('status')
                ->toggleable($canEdit, 'YA', 'TIDAK')
                ->contentClassField("bg-indigo-100")->visibleInExport(false),
            Column::make('Id', 'id'),
            Column::add()->title("NAMA GEDUNG")->field("nama")->editOnClick(hasPermission: $canEdit, saveOnMouseOut: true)->sortable(),
            Column::add()->title("LANTAI")->field("lantai")->editOnClick(hasPermission: $canEdit, saveOnMouseOut: true)->sortable(),
            Column::add()->title("PANJANG")->field("panjang")->editOnClick(hasPermission: $canEdit, saveOnMouseOut: true)->sortable()->sortable(),
            Column::add()->title("TINGGI")->field("tinggi")->editOnClick(hasPermission: $canEdit, saveOnMouseOut: true)->sortable()->sortable(),
            Column::add()->title("LEBAR")->field("lebar")->editOnClick(hasPermission: $canEdit, saveOnMouseOut: true)->sortable()->sortable(),
            Column::add()->title("KETERANGAN")->field("keterangan")->editOnClick(hasPermission: $canEdit, saveOnMouseOut: true)->sortable()->sortable(),
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

    #[\Livewire\Attributes\On('delete')]
    public function delete($rowId): void
    {
        $this->redirect(route("gedung-delete", $rowId));
    }

    public function onUpdatedToggleable(string $id, string $field, string $value): void
    {
        Gedung::query()->find($id)->update([
            $field => $value
        ]);
    }

    public function onUpdatedEditable(string|int $id, string $field, string $value): void
    {
        Gedung::query()->find($id)->update([
            $field => $value
        ]);
    }

    public function actions(\App\Models\Gedung $row): array
    {
        return [
            Button::add('hapus')
                ->slot('<i class="fa-solid fa-trash"></i>')
                ->id()
                ->class('px-2 py-1 rounded bg-red-400 text-white')
                ->dispatch('delete', ['rowId' => $row->id]),
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
