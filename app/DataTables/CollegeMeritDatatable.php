<?php

namespace App\DataTables;

use App\Models\College;
use App\Models\CollegeMerit;
use App\Models\Course;
use App\Models\MeritRound;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CollegeMeritDatatable extends DataTable
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
            // ->addColumn('action', 'collegemeritdatatable.action');
            ->addColumn('action', function ($data) {
                $result = '<div class="btn-group">';
                // $result .= '<a href="' . route('university.college.show', $data->id) . '"><button class="btn-sm btn-warning mr-sm-2 mb-1" title="store view"><i class="fa fa-eye" aria-hidden="true"></i></button></a>';
                $result .= '<a href="' . route('college.meritround.edit', $data->id) . '"><button class="btn-sm btn-primary mr-sm-2 mb-1" title="store update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>';
                $result .= '<button type="submit" data-id="' . $data->id . '" class="btn-sm btn-danger mr-sm-2 mb-1 delete" title="store delete" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return $result;
            })
            ->editColumn('college_id', function ($data) {
                $data = College::where('id', $data->college_id)->first();
                return $data->name;
            })

            ->editColumn('course_id', function ($data) {
                $data = Course::where('id', $data->course_id)->first();
                return $data->name;
            })
            ->editColumn('merit_round_id', function ($data) {
                $data = MeritRound::where('id', $data->merit_round_id)->first();
                return $data->round_no;
            })
            ->rawColumns(['action', 'college_id'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CollegeMeritDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CollegeMerit $model)
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
                    ->setTableId('collegemeritdatatable-table')
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
            Column::make('college_id')->title('College Name'),
            Column::make('course_id')->title('course name'),
            Column::make('merit_round_id')->title('round no'),
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
        return 'CollegeMerit_' . date('YmdHis');
    }
}
