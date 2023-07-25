<?php

namespace App\DataTables;

use App\Models\KelolaSiswa;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KelolaSiswaDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
            return view('admin.pages.users.siswa.component.action', compact('row'))->render();
        })
        ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()
            ->where('is_admin', 1)
            ->with(['detailSiswa']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('kelolasiswa-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->addColumnDef([
                        'responsivePriority' => 1,
                        'targets' => 1,
                    ])
                    ->orderBy(1, 'asc')
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('No')
                ->searchable(false)
                ->orderable(false)
                ->addClass("text-sm font-weight-normal")
                ->addClass('text-center'),
            Column::make('name')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Nama Lengkap'),
            Column::make('detail_siswa.nis')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->orderable(false)
                ->title('NIS'),
            Column::make('detail_siswa.nisn')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->orderable(false)
                ->title('NISN'),
            Column::make('detail_siswa.thn_masuk')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->orderable(false)
                ->title('Tahun Masuk'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass("text-sm font-weight-normal")
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'KelolaSiswa_' . date('YmdHis');
    }
}
