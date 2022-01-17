<?php

namespace App\DataTables;

use App\Models\Addmission;
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

            ->editColumn('user_id', function ($data) {
                $data = User::where('id', $data->user_id)->first();
                return $data->name;
            })

            ->editColumn('course_id', function ($data) {
                $data = Course::where('id', $data->course_id)->first();
                return $data->name;
            })

            ->editColumn('merit_round_id', function ($data) {
                $data = MeritRound::where('id', $data->merit_round_id)->first();
                return $data->round_no ?? '-';
            })

            ->editColumn('all', function ($data) {
                $result = '<div class="form-group">';
                $result .= '<input class="form-check-input checkbox" type="checkbox" id="checkbox" name="checkbox[]" data-id="' . $data->id . '" name="checkbox"></input>';
                return $result;
            })

            ->rawColumns(['action', 'status', 'course_id', 'all'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StudentAdmissionDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Addmission $model, Request $request)
    {
        // $data = $model->get()->filter(function ($order) use ($request) {
        //     // dd($order);          
        //     $selected_college = explode(',', $order->college_id);
        //     return $selected_college[0] == Auth::user()->id;
        // });
        // dd($data);
        // return $this->make(true);
        // $college_ids = Addmission::get(['id'])->pluck('id')->toArray();
        
        // $model->contains(function ($value, $key) {

        //     dd($value);
        //     // return $value > 5;
        //     $selected_college = explode(',', $order->college_id);
        //     return $selected_college[0] == Auth::user()->id;
        // });
        // dd(Auth::user()->id);
        // // $admissions = Addmission::select('college_id','id')->get();
        // foreach ($model as $admission) {
        //     $selected_college = explode(',', $admission->college_id);
        //     dd($selected_college[0]);
        //     // $adadmission = Addmission::whereIn('college_id', $selected_college[0])->get();
        //     if ($selected_college[0] == Auth::user()->id) {
        //         // dd(1);
        //         // $admission = Addmission::select('college_id')->get();
    
        //     }
        //     $data = Addmission::where($selected_college[0], Auth::user()->id)->get();
        // }
        // dd($admission);
        // return $data;
        // $collgemerit = CollegeMerit::where('');
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
            Column::make('all')->title('<button class="btn btn-danger" id="confirm">confirm</button>'),
            Column::make('id')->data('DT_RowIndex'),
            Column::make('user_id'),
            Column::make('addmission_date'),
            Column::make('addmission_code'),
            Column::make('course_id'),
            Column::make('merit_round_id'),
            Column::make('merit'),
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
        return 'StudentAdmission_' . date('YmdHis');
    }
}
