<?php

namespace App\DataTables;

use App\Models\Rombel;
use App\Models\RaporSiswa;
use App\Models\TahunAjaran;
use App\Models\LaporanRapor;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class LaporanRaporDataTable extends DataTable
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
        ->addColumn('siswa', function ($row) {
            $data = User::where('id', $row->siswa_id)->first();

            return $data->name;
        })
        ->rawColumns(['siswa'])
        ->addColumn('rombel', function ($row) {
            $rmbl = Rombel::where('walas_id', $row->walas_id)->first();

            return $rmbl->nama;
        })
        ->rawColumns(['rombel'])
        ->addColumn('kelas', function ($row) {
            $rmbl = Rombel::where('walas_id', $row->walas_id)->first();

            return $rmbl->kelas->nama;
        })
        ->rawColumns(['kelas'])
        ->addColumn('semester', function ($row) {
            $rmbl = Rombel::where('walas_id', $row->walas_id)->first();
            $data = TahunAjaran::findOrFail($rmbl->ta_id);
 
             $gnj = 'Semester Ganjil';
             $gnp = 'Semester Genap';
             if ($data->semester === 'ganjil') {
                 return $gnj;
             } else {
                 return $gnp;
             }
        })
        ->rawColumns(['semester'])
        ->addColumn('tajaran', function ($row) {
            $rmbl = Rombel::where('walas_id', $row->walas_id)->first();
            $data = TahunAjaran::findOrFail($rmbl->ta_id);
  
             return $data->ta;
        })
        ->rawColumns(['tajaran'])
        ->addColumn('walas', function ($row) {
            $data = User::where('id', $row->walas_id)->first();

            return $data->name;
        })
        ->rawColumns(['walas'])
        ->addColumn('action', function ($row) {
              return view('admin.pages.laporan.component.action', compact('row'))->render();
        })
        ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(RaporSiswa $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('laporanrapor-table')
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
                Column::make('siswa')
                    ->addClass("text-sm font-weight-normal text-wrap")
                    ->title('Nama Siswa'),
                Column::make('rombel')
                    ->addClass("text-sm font-weight-normal text-wrap text-center")
                    ->title('Rombel'),
                Column::make('kelas')
                    ->addClass("text-sm font-weight-normal text-wrap text-center")
                    ->title('Kelas'),
                Column::make('semester')
                    ->addClass("text-sm font-weight-normal text-wrap text-center")
                    ->title('Semester'),
                Column::make('tajaran')
                    ->addClass("text-sm font-weight-normal text-wrap text-center")
                    ->title('TA'),
                Column::make('walas')
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
        return 'LaporanRapor_' . date('YmdHis');
    }
}
