<?php

namespace App\Livewire;

use App\Models\Dosen;
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

final class DosenTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        // $this->showCheckBox();
        $time = time();
        return [
            Exportable::make("[$time]Data Dosen")
                ->columnWidth([
                    1 => 3,
                    3 => 50,
                ])
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Dosen::query();
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
            Column::action('')->visibleInExport(false),
            Column::make('ID', 'id'),
            Column::add()->title("NIDN")->field("nidn")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable(),
            Column::add()->title("NAMA DOSEN")->field("nama")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable(),
            Column::make('Created at', 'created_at')->visibleInExport(false),
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->redirect(route("dosen-update-index", $rowId));
    }

    #[\Livewire\Attributes\On('hapus')]
    public function hapus($rowId): void
    {
        $this->redirect(route("dosen-delete", $rowId));
    }

    public function onUpdatedEditable(string|int $id, string $field, string $value): void
    {
        Dosen::query()->find($id)->update([
            $field => $value
        ]);
    }

    public function actions(\App\Models\Dosen $row): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="fa-solid fa-pen"></i>')
                ->id()
                ->class('px-2 py-1 rounded bg-indigo-400 text-white')
                ->dispatch('edit', ['rowId' => $row->id]),
            Button::add('hapus')
                ->slot('<i class="fa-solid fa-trash"></i>')
                ->id()
                ->class('px-2 py-1 rounded bg-red-400 text-white')
                ->dispatch('hapus', ['rowId' => $row->id]),
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
