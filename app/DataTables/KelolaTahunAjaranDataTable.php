<?php

namespace App\DataTables;

use App\Models\KelolaTahunAjaran;
use App\Models\TahunAjaran;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KelolaTahunAjaranDataTable extends DataTable
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
            return view('admin.pages.sistem.tajaran.component.action', compact('row'))->render();
        })
        ->addColumn('semester_formatted', function ($row) {
            $gnj = 'Semester Ganjil';
            $gnp = 'Semester Genap';
            if ($row->semester === 'ganjil') {
                return $gnj;
            } else {
                return $gnp;
            }
        })
        ->rawColumns(['semester_formatted'])
        ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(TahunAjaran $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('kelolatahunajaran-table')
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
            Column::make('ta')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Tahun Ajaran'),
            Column::make('semester_formatted')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Semester'),
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
        return 'KelolaTahunAjaran_' . date('YmdHis');
    }
}
