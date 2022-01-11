<?php

namespace App\DataTables;

use App\Models\Course;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CourseDatatable extends DataTable
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
            // ->addColumn('action', 'coursedatatable.action');
            ->addColumn('action', function ($data) {
                $result = '<div class="btn-group">';
                // $result .= '<a href="' . route('college.course.show', $data->id) . '"><button class="btn-sm btn-warning mr-sm-2 mb-1" title="store view"><i class="fa fa-eye" aria-hidden="true"></i></button></a>';
                // $result .= '<a href="' . route('university.course.edit', $data->id) . '"><button class="btn-sm btn-primary mr-sm-2 mb-1" title="store update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>';
                $result .= '<button type="submit" data-id="' . $data->id . '" class="btn-sm btn-danger mr-sm-2 mb-1 delete" title="store delete" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return $result;
            })

            ->editColumn('status', function ($data) {
                if ($data['status'] == '0') {
                    return '<button type="button" data-id="' . $data->id . '" class="badge badge-pill-lg badge-success status">Active</button>';
                } else {
                    return '<button type="button" data-id="' . $data->id . '" class="badge badge-pill-lg badge-danger status">Inactive</button>';
                }
            })
            ->rawColumns(['action', 'status'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CourseDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Course $model)
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
            ->setTableId('coursedatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bflrtip')
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
        return 'Course_' . date('YmdHis');
    }
}
