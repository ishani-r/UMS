<?php

namespace App\DataTables;

use App\Models\Addmission;
use App\Models\CollegeMerit;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReservedStudentDatatable extends DataTable
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
            // ->addColumn('action', 'reservedstudentdatatable.action');
            ->addColumn('action', function ($data) {
                $result = '<div class="btn-group">';
                // $result .= '<button type="submit" data-id="' . $data->id . '" class="btn-sm btn-danger mr-sm-2 mb-1 delete" title="store delete" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                $result = '<button type="button" class="btn-sm btn-success mr-sm-2 mb-1 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Approve </button>';
                $result .= '<div class="dropdown-menu" data-id="' . $data->id . '">
                <a class="dropdown-item approve" data-id="' . $data->id . '" is_approve="1">Confirm<i class="fa fa-check float-right"></i></a>
                <a class="dropdown-item approve" data-id="' . $data->id . '" is_approve="2">Rejected<i class="fa fa-times float-right"></i></a>
                    </div>
                ';
                return $result;
            })

            ->editColumn('status', function ($data) {
                if ($data['status'] == '3') {
                    return '<button type="button" data-id="' . $data->id . '" class="btn btn-warning mr-1 mb-1">Panding</button>';
                } else if($data['status'] == '1'){
                    return '<button type="button" data-id="' . $data->id . '" class="btn btn-success mr-1 mb-1">Confirm</button>';
                } else if($data['status'] == '2'){
                    return '<button type="button" data-id="' . $data->id . '" class="btn btn-success mr-1 mb-1">Rejected</button>';
                } else {
                    return '<button type="button" data-id="' . $data->id . '" class="btn btn-success mr-1 mb-1">Next</button>';
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

            ->rawColumns(['action', 'status'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ReservedStudentDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Addmission $model)
    {
        // $college_merit = CollegeMerit::where('college_id', Auth::user()->id)->first();
        // $college_id = Auth::user()->id;
        // if ($college_merit) {
        //     return
        //         $model->where('merit', '<=', $college_merit->merit)
        //         ->where('college_id', 'like', '%"' . $college_id . '"%')
        //         ->newQuery();
        // } else {
        //     return $model->where('id', -1)->newQuery();
        // }
        $college_id = Auth::guard('college')->user()->id;
        if ($college_id) {
            return
                $model
                ->where('college_id', 'like', '%"' . $college_id . '"%')
                ->where('status', '!=', '1')    
                // ->with(['user_data', 'course_data', 'merit_round_data'])
                ->newQuery();
        }
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('reservedstudentdatatable-table')
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
            Column::make('merit'),
            Column::make('course_id'),
            Column::make('addmission_code'),
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
        return 'ReservedStudent_' . date('YmdHis');
    }
}
