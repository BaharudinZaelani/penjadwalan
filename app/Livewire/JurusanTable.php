<?php

namespace App\Livewire;

use App\Models\Jurusan;
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

final class JurusanTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $time = time();
        return [
            Exportable::make("[$time]Data Jurusan")
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV)
                ->columnWidth([
                    1 => 3,
                    2 => 30,
                    3 => 30,
                    4 => 30,
                    5 => 30,
                    6 => 30,
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
            Column::action('')->visibleInExport(false),
            Column::add()
                ->title('status')
                ->field('status')
                ->toggleable(true, 'YA', 'TIDAK')
                ->contentClassField("bg-indigo-100")
                ->visibleInExport(false),
            Column::make('ID', 'id'),
            Column::add()->title("NAMA (INDONESIA)")->field("nama_idn")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable()->searchable(),
            Column::add()->title("NAMA (INGGRIS)")->field("nama_en")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable()->searchable(),
            Column::add()->title("BIDANG KEAHLIAN")->field("bidang_keahlian")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable()->searchable(),
            Column::add()->title("KOMPETENSI UMUM")->field("kompetensi_umum")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable()->searchable(),
            Column::add()->title("KOMPETENSI KHUSUS")->field("kompetensi_khusus")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable()->searchable(),
            // Column::add()->title("pejabat")->field("pejabat")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable()->searchable(),
            // Column::add()->title("jabatan")->field("jabatan")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable()->searchable(),
            Column::add()->title("KETERANGAN")->field("keterangan")->editOnClick(hasPermission: true, saveOnMouseOut: true)->sortable()->searchable(),
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
        Jurusan::query()->find($id)->update([
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
