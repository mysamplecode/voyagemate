<?php

namespace App\DataTables;
use App\Models\Language;
use Yajra\Datatables\Services\DataTable;

class LanguageDataTable extends DataTable
{

    protected $exportColumns = ['name', 'value', 'status'];

    public function ajax()
    {
        $language = $this->query();

        return $this->datatables
            ->of($language)
            ->addColumn('action', function ($language) {   
                $edit = '<a href="'.url('admin/settings/edit_language/'.$language->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;';
                $delete = '<a href="'.url('admin/settings/delete_language/'.$language->id).'" class="btn btn-xs btn-danger delete-warning"><i class="glyphicon glyphicon-trash"></i></a>';
                return $edit.$delete;
            })
            ->make(true);
    }

    public function query()
    {
        $language = Language::select();
        return $this->applyScopes($language);
    }

    public function html()
    {
        return $this->builder()
        ->columns([
            'name',
            'short_name',
            'status'
        ])
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
        ->parameters([
            'dom' => 'lBfrtip',
            'buttons' => [],
        ]);
    }
}
