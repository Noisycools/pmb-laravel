<?php

namespace App\DataTables;

use App\Models\ProgramStudi;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProgramStudiDataTable extends DataTable
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
            ->addColumn('nama_fakultas_jurusan', function(ProgramStudi $programStudi){
                return $programStudi->fakultasJurusan->nama_fakultas_jurusan;
            })
            ->addColumn('action', function (ProgramStudi $programStudi) {
                $actionBtn = '<a href="' . route('programStudi.edit', ['programStudi' => $programStudi->id]) . '" class="edit btn btn-success btn-sm">Edit</a> <form method="post" action="' . route('programStudi.destroy', $programStudi->id) . '">' . method_field('delete') . '<br>' . csrf_field() . '<button type="submit" class="delete btn btn-danger btn-sm">Delete</button></form>';
                return $actionBtn;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProgramStudi $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ProgramStudi $model)
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
                    ->setTableId('programstudi-table')
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
            Column::make('nama_program_studi'),
            Column::make('deskripsi'),
            Column::make('nama_fakultas_jurusan'),
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
        return 'ProgramStudi_' . date('YmdHis');
    }
}
