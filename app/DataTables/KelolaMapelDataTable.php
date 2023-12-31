<?php

namespace App\DataTables;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Jurusan;
use App\Models\Rombel;
use App\Models\TahunAjaran;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class KelolaMapelDataTable extends DataTable
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
            return view('admin.pages.sistem.mapel.component.action', compact('row'))->render();
        })
        ->addColumn('kelas_formatted', function ($row) {
            $rmb = Rombel::findOrFail($row->rombel_id);

            return $rmb->kelas->nama;
        })
        ->rawColumns(['kelas_formatted'])
        ->addColumn('jurusan_formatted', function ($row) {
            $rmb = Rombel::findOrFail($row->rombel_id);

            return $rmb->kelas->jurusan->nama;
        })
        ->rawColumns(['jurusan_formatted'])
        ->addColumn('semester_formatted', function ($row) {
            $rmb = Rombel::findOrFail($row->rombel_id);
            $taj = TahunAjaran::findOrFail($rmb->ta_id);

            $gnj = 'Ganjil';
            $gnp = 'Genap';
            if ($taj->semester === 'ganjil') {
                return $gnj;
            } else {
                return $gnp;
            }
        })
        ->rawColumns(['semester_formatted'])
        ->addColumn('tajaran_formatted', function ($row) {
            $rmb = Rombel::findOrFail($row->rombel_id);
            $taj = TahunAjaran::findOrFail($rmb->ta_id);

            return $taj->ta;
        })
        ->rawColumns(['tajaran_formatted'])
        ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Mapel $model): QueryBuilder
    {
        return $model->newQuery()
        ->with(['rombel', 'guru']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('kelolamapel-table')
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
                ->title('Nama Mata Pelajaran'),
            Column::make('rombel.nama')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Rombel'),
            Column::make('kelas_formatted')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Kelas'),
            Column::make('jurusan_formatted')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Jurusan'),
            Column::make('semester_formatted')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Semester'),
            Column::make('tajaran_formatted')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Tahun Ajaran'),
            Column::make('guru.name')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Guru'),
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
        return 'KelolaMapel_' . date('YmdHis');
    }
}
