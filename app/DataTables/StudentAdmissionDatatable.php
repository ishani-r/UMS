<?php

namespace App\DataTables;

use App\Models\Addmission;
use App\Models\AddmissionConfiram;
use App\Models\College;
use App\Models\CollegeMerit;
use App\Models\User;
use App\Models\Course;
use App\Models\MeritRound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StudentAdmissionDatatable extends DataTable
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
            // ->addColumn('action', 'studentadmissiondatatable.action');
            ->addColumn('action', function ($data) {
                $result = '<div class="btn-group">';
                $result .= '<button type="submit" data-id="' . $data->id . '" class="btn-sm btn-danger mr-sm-2 mb-1 delete" title="store delete" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return $result;
            })

            // ->editColumn('confirm_college_id', function ($data) {
            //     $data = College::where('id', $data->confirm_college_id)->first();
            //     return $data->name;
            // })

           

            ->addColumn('user_id', function ($data) {
                $datas = Addmission::where('id', $data->addmission_id)->first();
                $user = User::where('id',$datas->user_id)->first();
                return $user->name;
            })

            ->addColumn('course_id', function ($data) {
                $datas = Addmission::where('id', $data->addmission_id)->first();
                $Course = Course::where('id',$datas->course_id)->first();
                return $Course->name;
            })
            
            ->addColumn('addmission_date', function ($data) {
                $datas = Addmission::where('id', $data->addmission_id)->select('addmission_date')->first();
                return $datas->addmission_date;
            })

            ->addColumn('addmission_code', function ($data) {
                $datas = Addmission::where('id', $data->addmission_id)->select('addmission_code')->first();
                return $datas->addmission_code;
            })

            ->rawColumns(['action', 'user_id'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StudentAdmissionDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AddmissionConfiram $model)
    {
        return $model->where('confirm_college_id',Auth::guard('college')->user()->id)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('studentadmissiondatatable-table')
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
            Column::make('course_id'),
            // Column::make('addmission_id'),
            // Column::make('confirm_college_id'),
            Column::make('confirm_merit'),
            Column::make('addmission_code'),
            Column::make('addmission_date'),
            Column::make('confirmation_type'),
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
        return 'StudentAdmission_' . date('YmdHis');
    }
}
