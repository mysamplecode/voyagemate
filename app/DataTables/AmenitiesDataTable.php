<?php

/**
 * AmenitiesData Data Table
 *
 * AmenitiesData Data Table handles AmenitiesData datas. 
 *
 * @category   AmenitiesData
 * @package    vRent
 * @author     Techvillage Dev Team
 * @copyright  2017 Techvillage
 * @license    
 * @version    1.3
 * @link       http://techvill.net
 * @since      Version 1.3
 * @deprecated None
 */

namespace App\DataTables;

use App\Models\Amenities;
use Yajra\Datatables\Services\DataTable;

class AmenitiesDataTable extends DataTable
{
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', function ($amenities) {

                $edit = '<a href="'.url('admin/edit_amenities/'.$amenities->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;';
                $delete = '<a href="'.url('admin/delete_amenities/'.$amenities->id).'" class="btn btn-xs btn-danger delete-warning"><i class="glyphicon glyphicon-trash"></i></a>';
         
                return $edit.' '.$delete;
            })
            ->make(true);
    }

    public function query()
    {
        $query = Amenities::select();

        return $this->applyScopes($query);
    }
	
    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'title', 'name' =>'amenities.title', 'title' => 'Name'])
            ->addColumn(['data' => 'description', 'name' =>'amenities.description', 'title' => 'Description'])
            ->addColumn(['data' => 'symbol', 'name' =>'amenities.symbol', 'title' => 'Symbol'])
            ->addColumn(['data' => 'status', 'name' =>'amenities.status', 'title' => 'Status'])
            ->addColumn(['data' => 'action', 'name' =>'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
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
        return 'amenitiesdatatables_' . time();
    }
}
