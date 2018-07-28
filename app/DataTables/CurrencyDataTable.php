<?php

namespace App\DataTables;
use App\Models\Currency;
use Yajra\Datatables\Services\DataTable;

class CurrencyDataTable extends DataTable
{
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', function ($currency) {

                $edit = '<a href="'.url('admin/settings/edit_currency/'.$currency->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;';
                $delete = '<a href="'.url('admin/settings/delete_currency/'.$currency->id).'" class="btn btn-xs btn-danger delete-warning"><i class="glyphicon glyphicon-trash"></i></a>';
                // $delete = (Auth::admin()->user()->can('delete_user')) ? '<a data-href="'.url('admin/delete_user/'.$users->id).'" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#confirm-delete"><i class="glyphicon glyphicon-trash"></i></a>' : '';

                return $edit.' '.$delete;
            })
            ->make(true);
    }

    public function query()
    {
        $query = Currency::query();
        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'name', 'name' => 'currency.name', 'title' => 'Name'])
            ->addColumn(['data' => 'code', 'name' => 'currency.code', 'title' => 'Code'])
            ->addColumn(['data' => 'org_symbol', 'name' => 'currency.symbol', 'title' => 'Symbol'])
            ->addColumn(['data' => 'rate', 'name' => 'currency.rate', 'title' => 'Rate'])
            ->addColumn(['data' => 'status', 'name' => 'currency.status', 'title' => 'Status'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
            ->parameters($this->getBuilderParameters());
    }

    protected function getColumns()
    {
        return [
            'id',
            'created_at',
            'updated_at',
        ];
    }

    protected function filename()
    {
        return 'currencydatatables_' . time();
    }
}
