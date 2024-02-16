<?php

namespace App\Livewire;

use App\Models\Gedung;
use Illuminate\Contracts\View\View;
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
                ->contentClassField("bg-indigo-100"),
            Column::make('Id', 'id'),
            Column::add()->title("Nama Gedung")->field("nama")->editOnClick(hasPermission: $canEdit, saveOnMouseOut: true)->sortable(),
            Column::add()->title("Lantai")->field("lantai")->editOnClick(hasPermission: $canEdit, saveOnMouseOut: true)->sortable(),
            Column::add()->title("Panjang")->field("panjang")->editOnClick(hasPermission: $canEdit, saveOnMouseOut: true)->sortable()->sortable(),
            Column::add()->title("tinggi")->field("tinggi")->editOnClick(hasPermission: $canEdit, saveOnMouseOut: true)->sortable()->sortable(),
            Column::add()->title("lebar")->field("lebar")->editOnClick(hasPermission: $canEdit, saveOnMouseOut: true)->sortable()->sortable(),
            Column::add()->title("keterangan")->field("keterangan")->editOnClick(hasPermission: $canEdit, saveOnMouseOut: true)->sortable()->sortable(),
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
