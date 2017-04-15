<?php namespace App\Datatables;

class PostsDatatable extends Datatable
{
    protected $columns = [
        'row_num',
        'title',
        'author',
        'id',
        'actions'
    ];

    public function rowNum($id)
    {
        if (isset($_GET['page'])) {
            $row_num = ($_GET['page'] - 1) * 15 + $this->increment;
        } else {
            $row_num = $this->increment;
        }

        return '<td>' . $row_num . '</td>';
    }

    public function author($id)
    {
        return '<td>' . $this->data->find($id)->user->name . '</td>';
    }

    public function actions($id)
    {
        return '<td>' . $this->actionButtons($id) . '</td>';
    }

    protected function actionButtons($id)
    {
        $buttons = '<a href="' . admin_url('post/edit/' . $id) . '" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>' . PHP_EOL;
        $buttons .= '<a href="' . admin_url('post/delete/' . $id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';

        return $buttons;
    }
}
