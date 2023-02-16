<?php

namespace App\DataTables;

use App\Models\Company;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DashboardDataTable extends DataTable
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
            ->setRowId(function ($row) {
                return $row->id;
            })
            ->editColumn('created_at', function ($query) {
                return $query->created_at->format('d MMM Y'); // human readable format
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at->locale('id');
            })
            ->editColumn('id', function ($row) {
                return count($row->employees);
            });
    }
    public function query(Company $model)
    {
        $query =  $model->with('employees')->newQuery();
        return $query;
    }
    public function html()
    {
        return $this->builder()
            ->setTableId('company-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"dataTables_wrapper dt-bootstrap"B<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex"l>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>')
            ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('name')->title('Nama Perusahaan'),
            Column::make('id')->title('Jumlah Karyawan'),
            Column::make('created_at')->title('Dibuat Tanggal'),
        ];
    }
}
