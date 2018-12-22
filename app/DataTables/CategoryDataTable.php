<?php

namespace App\DataTables;

use App\Data\Model\Category;
use App\User;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', function ($category) {
                return view('admin.category.action', compact(
                    'category'))->render();
            })
            ->editColumn('image', function ($category) {
                return '<i class="fas fa-money-bill-wave" style="font-size: 32px"></i>';
            })
            ->rawColumns(['image', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Category::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $dom = "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>
                     <'row'<'col-sm-12 table-responsive'tr>>
                     <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>";
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '80px'])
            ->parameters(
                [
                    'lengthMenu' => [[10, 20, 50, 100, 200], [10, 20, 50, 100, 200]],
                    'dom' => $dom,
                ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'image',
            'name',
            'description',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Category_' . date('YmdHis');
    }
}
