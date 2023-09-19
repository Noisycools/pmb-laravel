<?php

namespace App\DataTables;

use App\Models\FakultasJurusan;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FakultasJurusanDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function (FakultasJurusan $fakultasJurusan) {
                $actionBtn = '<a href="' . route('fakultasJurusan.edit', ['fakultasJurusan' => $fakultasJurusan->id]) . '" class="edit btn btn-success btn-sm">Edit</a> <form method="post" action="' . route('fakultasJurusan.destroy', $fakultasJurusan->id) . '">' . method_field('delete') . '<br>' . csrf_field() . '<button type="submit" class="delete btn btn-danger btn-sm">Delete</button></form>';
                return $actionBtn;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\FakultasJurusan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(FakultasJurusan $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('fakultasjurusan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0, 'asc')
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('nama_fakultas_jurusan'),
            Column::make('deskripsi'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'FakultasJurusan_' . date('YmdHis');
    }
}
