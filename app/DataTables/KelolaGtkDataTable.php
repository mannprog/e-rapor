<?php

namespace App\DataTables;

use App\Models\KelolaGtk;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KelolaGtkDataTable extends DataTable
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
                return view('admin.pages.users.gtk.component.action', compact('row'))->render();
            })
            ->addColumn('jabatan', function ($row) {
                $ad = 'Admin';
                $ks = 'Kepala Sekolah';
                $wk = 'Walikelas';
                $gr = 'Guru';
                if ($row->detailGtk->jabatan === 'admin') {
                    return $ad;
                } elseif($row->detailGtk->jabatan === 'kepalasekolah') {
                    return $ks;
                } elseif($row->detailGtk->jabatan === 'walikelas') {
                    return $wk;
                } else {
                    return $gr;
                }
            })
            ->rawColumns(['jabatan'])
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()
            ->where('is_admin', 0)
            ->with(['detailGtk']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('kelolagtk-table')
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
            Column::make('username')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Username'),
            Column::make('email')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->title('Email'),
            Column::make('jabatan')
                ->addClass("text-sm font-weight-normal text-wrap")
                ->orderable(false)
                ->title('Jabatan'),
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
        return 'KelolaGtk_' . date('YmdHis');
    }
}
