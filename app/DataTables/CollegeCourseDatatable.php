<?php

namespace App\DataTables;

use App\Models\College;
use App\Models\CollegeCourse;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CollegeCourseDatatable extends DataTable
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
            // ->addColumn('action', 'collegecoursedatatable.action');
            ->addColumn('action', function ($data) {
                $result = '<div class="btn-group">';
                // $result .= '<a href="' . route('college.course.show', $data->id) . '"><button class="btn-sm btn-warning mr-sm-2 mb-1" title="store view"><i class="fa fa-eye" aria-hidden="true"></i></button></a>';
                $result .= '<a href="' . route('college.college-course.edit', $data->id) . '"><button class="btn-sm btn-primary mr-sm-2 mb-1" title="store update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>';
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

            ->editColumn('college_id', function ($data) {
                $data = College::where('id', $data->college_id)->first();
                return $data->name;
            })

            ->editColumn('course_id', function ($data) {
                $data = Course::where('id', $data->course_id)->first();
                return $data->name;
            })

            ->rawColumns(['action', 'status'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CollegeCourseDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CollegeCourse $model)
    {
        return $model->where('college_id', Auth::guard('college')->user()->id)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('collegecoursedatatable-table')
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
            Column::make('college_id'),
            Column::make('course_id'),
            Column::make('seat_no')->title('Total Seat'),
            Column::make('reserved_seat'),
            Column::make('merit_seat'),
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
        return 'CollegeCourse_' . date('YmdHis');
    }
}
