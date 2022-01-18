<?php

namespace App\DataTables;

use App\Models\Course;
use App\Models\MeritRound;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MeritRoundDatatable extends DataTable
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
            // ->addColumn('action', 'meritrounddatatable.action');
            ->addColumn('action', function ($data) {
                $result = '<div class="btn-group">';
                // $result .= '<a href="' . route('university.meritround.show', $data->id) . '"><button class="btn-sm btn-warning mr-sm-2 mb-1" title="store view"><i class="fa fa-eye" aria-hidden="true"></i></button></a>';
                $result .= '<a href="' . route('university.meritround.edit', $data->id) . '"><button class="btn-sm btn-primary mr-sm-2 mb-1" title="merit round update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>';
                $result .= '<button type="submit" data-id="' . $data->id . '" class="btn-sm btn-danger mr-sm-2 mb-1 delete" title="merit round delete" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return $result;
            })

            ->editColumn('status', function ($data) {
                if ($data['status'] == '0') {
                    return '<button type="button" data-id="' . $data->id . '" class="badge badge-pill-lg badge-danger status">Inactive</button>';
                } else {
                    return '<button type="button" data-id="' . $data->id . '" class="badge badge-pill-lg badge-success status">Active</button>';
                }
            })

            ->editColumn('course_id', function ($data) {
                $data = Course::where('id', $data->course_id)->first();
                return $data->name;
            })

            ->rawColumns(['action','status','course_id'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\MeritRoundDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MeritRound $model)
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
                    ->setTableId('meritrounddatatable-table')
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
            Column::make('round_no'),
            Column::make('course_id'),
            Column::make('start_date'),
            Column::make('end_date'),
            Column::make('merit_result_declare_date'),
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
        return 'MeritRound_' . date('YmdHis');
    }
}
