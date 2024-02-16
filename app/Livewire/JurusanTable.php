<?php

namespace App\Livewire;

use App\Models\Jurusan;
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

final class JurusanTable extends PowerGridComponent
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
        return Jurusan::query();
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
            Column::action('Action')->visibleInExport(false),
            Column::add()->title("nama (indonesia)")->field("nama_idn")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable()->searchable(),
            Column::add()->title("nama (Inggris)")->field("nama_en")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable()->searchable(),
            Column::add()->title("bidang keahlian")->field("bidang_keahlian")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable()->searchable(),
            Column::add()->title("kompetensi umum")->field("kompetensi_umum")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable()->searchable(),
            Column::add()->title("kompetensi khusus")->field("kompetensi_khusus")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable()->searchable(),
            Column::add()->title("pejabat")->field("pejabat")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable()->searchable(),
            Column::add()->title("jabatan")->field("jabatan")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable()->searchable(),
            Column::add()->title("keterangan")->field("keterangan")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable()->searchable(),
            Column::make('Created at', 'created_at', 'created_at')->sortable(),
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('delete')]
    public function delete($rowId): void
    {
        $this->redirect(route("jurusan-delete", $rowId));
    }

    public function onUpdatedToggleable(string $id, string $field, string $value): void
    {
        Kelas::query()->find($id)->update([
            $field => $value
        ]);
    }

    public function actions(\App\Models\Jurusan $row): array
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
