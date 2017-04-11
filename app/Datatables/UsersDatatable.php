<?php namespace App\Datatables;

class UsersDatatable extends Datatable
{
    protected $columns = [
        'row_num',
        'name',
        'id',
        'actions'
    ];

    public function rowNum($id)
    {
        return '<td>' . $this->increment . '</td>';
    }

    public function actions($id)
    {
        return '<td>' . $this->actionButtons($id) . '</td>';
    }

    protected function actionButtons($id)
    {
        $buttons = '<a href="' . admin_url('user/' . $id) . '" class="btn btn-info btn-sm"><i class="fa fa-user"></i></a>' . PHP_EOL;
        $buttons .= '<a href="' . admin_url('user/edit/' . $id) . '" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>' . PHP_EOL;
        $buttons .= '<a href="' . admin_url('user/delete/' . $id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';

        return $buttons;
    }
}