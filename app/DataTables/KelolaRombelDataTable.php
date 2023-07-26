<?php

namespace App\DataTables;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\KelolaRombel;
use App\Models\Rombel;
use App\Models\TahunAjaran;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KelolaRombelDataTable extends DataTable
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
            return view('admin.pages.sistem.rombel.component.action', compact('row'))->render();
        })
        ->addColumn('jurusan_formatted', function ($row) {
            $kls = Kelas::findOrFail($row->kelas_id);
            $data = Jurusan::findOrFail($kls->jurusan_id);

            return $data->nama;
        })
        ->rawColumns(['jurusan_formatted'])
        ->addColumn('ta_formatted', function ($row) {
           $data = TahunAjaran::findOrFail($row->ta_id);

           return $data->ta;
        })
        ->rawColumns(['ta_formatted'])
        ->addColumn('semester_formatted', function ($row) {
           $data = TahunAjaran::findOrFail($row->ta_id);

            $gnj = 'Semester Ganjil';
            $gnp = 'Semester Genap';
            if ($data->semester === 'ganjil') {
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
    public function query(Rombel $model): QueryBuilder
    {
        return $model->newQuery()
        ->with(['kelas', 'tahunAjaran', 'walas']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('kelolarombel-table')
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
            Column::make('nama')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Nama Rombel'),
            Column::make('kelas.nama')
                ->addClass("text-sm font-weight-normal text-wrap text-center")
                ->title('Kelas'),
            Column::make('jurusan_formatted')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Jurusan'),
            Column::make('ta_formatted')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Tahun Ajaran'),
            Column::make('semester_formatted')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Semester'),
            Column::make('walas.name')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Walikelas'),
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
        return 'KelolaRombel_' . date('YmdHis');
    }
}
