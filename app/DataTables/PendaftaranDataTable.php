<?php

namespace App\DataTables;

use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PendaftaranDataTable extends DataTable
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
            ->addColumn('nama_mahasiswa', function (Pendaftaran $Pendaftaran) {
                return $Pendaftaran->mahasiswa->nama;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Pendaftaran $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $email = auth()->user()->email;
        $mahasiswa = Mahasiswa::where('email', $email)->first();

        $query = Pendaftaran::
            where('mahasiswa_id', $mahasiswa->id)
            ->select('mahasiswa_id', 'tanggal_pendaftaran', 'status_pembayaran', 'status', 'keterangan');

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('pendaftaran-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1, 'asc')
                    ->buttons(
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
            Column::make('nama_mahasiswa'),
            Column::make('tanggal_pendaftaran'),
            Column::make('status_pembayaran'),
            Column::make('status'),
            Column::make('keterangan'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Pendaftaran_' . date('YmdHis');
    }
}
