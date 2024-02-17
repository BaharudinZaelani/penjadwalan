<?php

namespace App\Livewire;

use App\Models\Kelas;
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

final class KelasTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $time = time();
        return [
            Exportable::make("[$time]Data Kelas")
                ->columnWidth([
                    1 => 3,
                    2 => 10
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
        return Kelas::query();
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
            Column::add()->title("STATUS")->field("status")->toggleable(true, "YES", "NO")->visibleInExport(false),
            Column::make('ID', 'id'),
            Column::add()->title("NAMA")->field("nama")->sortable()->searchable()->editOnClick(hasPermission: true, saveOnMouseOut: true),
            Column::add()->title("CREATED AT")->field("created_at")->sortable()->visibleInExport(false),
        ];
    }

    public function filters(): array
    {
        return [];
    }

    public function onUpdatedToggleable(string $id, string $field, string $value): void
    {
        Kelas::query()->find($id)->update([
            $field => $value
        ]);
    }

    #[\Livewire\Attributes\On('delete')]
    public function delete($rowId): void
    {
        $this->redirect(route("kelas-delete", $rowId));
    }

    public function actions(\App\Models\Kelas $row): array
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
