<?php

namespace App\Livewire;

use App\Models\Ruangan;
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

final class RuanganTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {

        $time = time();
        return [
            Exportable::make("[$time]Data Ruangan")
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV)
                ->columnWidth([
                    1 => 3,
                    2 => 30,
                    3 => 10,
                    4 => 10,
                    5 => 80
                ]),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Ruangan::query()->with("gedung");
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('gedung.nama')
            ->add('nama')
            ->add('kapasitas_belajar')
            ->add('kapasitas_ujian')
            ->add('keterangan')
            ->add("created_at");
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
            Column::make('ID', 'id'),
            Column::add()->title("nama")->field("nama")->editOnClick(hasPermission: true, saveOnMouseOut: true)->searchable()->sortable(),
            Column::add()->field("kapasitas_belajar")->title("kapasitas belajar")->editOnClick(hasPermission: true, saveOnMouseOut: true)->searchable()->sortable(),
            Column::add()->field("kapasitas_ujian")->title("kapasitas ujian")->editOnClick(hasPermission: true, saveOnMouseOut: true)->searchable()->sortable(),
            Column::add()->title("keterangan")->field("keterangan")->editOnClick(hasPermission: true, saveOnMouseOut: true)->searchable()->sortable(),
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
        $this->redirect(route("ruangan-delete", $rowId));
    }

    public function onUpdatedToggleable(string $id, string $field, string $value): void
    {
        Ruangan::query()->find($id)->update([
            $field => $value
        ]);
    }
    public function onUpdatedEditable(string|int $id, string $field, string $value): void
    {
        Ruangan::query()->find($id)->update([
            $field => $value
        ]);
    }

    public function actions(\App\Models\Ruangan $row): array
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
