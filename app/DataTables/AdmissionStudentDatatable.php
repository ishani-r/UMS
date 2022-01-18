<?php

namespace App\DataTables;

use App\Models\Addmission;
use App\Models\College;
use App\Models\Course;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdmissionStudentDatatable extends DataTable
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
            // ->addColumn('action', 'admissionstudentdatatable.action');
            ->editColumn('status', function ($data) {
                if ($data['status'] == '0') {
                    return '<button type="button" data-id="' . $data->id . '" class="btn btn-info round mr-1 mb-1">Next</button>';
                } else if ($data['status'] == '1'){
                    return '<button type="button" data-id="' . $data->id . '" class="btn btn-success round mr-1 mb-1">Confirm</button>';
                } else {
                    return '<button type="button" data-id="' . $data->id . '" class="btn btn-danger round mr-1 mb-1">Rejected</button>';
                }
            })
            ->editColumn('user_id', function ($data) {
                $data = User::where('id', $data->user_id)->first();
                return $data->name ?? '-';
            })

            ->editColumn('course_id', function ($data) {
                $data = Course::where('id', $data->course_id)->first();
                return $data->name ?? '-';
            })

            ->editColumn('college_id', function ($data) {
                $data = College::whereIn('id', $data->college_id)->pluck('name')->toArray();
                return implode('<br>',$data);
            })
            ->rawColumns(['action','status', 'college_id'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AdmissionStudentDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Addmission $model)
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
                    ->setTableId('admissionstudentdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
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
            Column::make('user_id'),
            Column::make('college_id'),
            Column::make('merit'),
            Column::make('course_id'),
            Column::make('merit_round_id'),
            Column::make('addmission_date'),
            Column::make('addmission_code'),
            Column::make('status'),
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'AdmissionStudent_' . date('YmdHis');
    }
}
