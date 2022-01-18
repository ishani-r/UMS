<?php

namespace App\DataTables;

use App\Models\College;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CollegeDatatable extends DataTable
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
            // ->addColumn('action', 'collegedatatable.action')
            ->addColumn('action', function ($data) {
                $result = '<div class="btn-group">';
                $result .= '<a href="' . route('university.college.show', $data->id) . '"><button class="btn-sm btn-warning mr-sm-2 mb-1" title="college view"><i class="fa fa-eye" aria-hidden="true"></i></button></a>';
                $result .= '<a href="' . route('university.college.edit', $data->id) . '"><button class="btn-sm btn-primary mr-sm-2 mb-1" title="college update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>';
                $result .= '<button type="submit" data-id="' . $data->id . '" class="btn-sm btn-danger mr-sm-2 mb-1 delete" title="college delete" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return $result;
            })
            
            ->editColumn('logo', function ($data) {
                if ($data->logo) {
                    return '<img src="' . asset('storage/college/' . $data->logo) . '" width="80px" height="40px">';
                }
            })

            ->editColumn('status', function ($data) {
                if ($data['status'] == '0') {
                    return '<button type="button" data-id="' . $data->id . '" class="badge badge-pill-lg badge-success status">Active</button>';
                } else {
                    return '<button type="button" data-id="' . $data->id . '" class="badge badge-pill-lg badge-danger status">Inactive</button>';
                }
            })

            ->rawColumns(['action', 'logo', 'status'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CollegeDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(College $model)
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
            ->setTableId('collegedatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(1)
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
            Column::make('id')->data('DT_RowIndex'),
            Column::make('name'),
            Column::make('email'),
            Column::make('contact_no'),
            Column::make('address'),
            Column::make('logo'),
            Column::make('status'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
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
        return 'College_' . date('YmdHis');
    }
}
