<?php namespace App\Datatables;

class UsersDatatable extends Datatable
{
    protected $columns = [
        'row_num',
        'name',
        'id',
        'actions'
    ];

    public function thActions()
    {
        return $this->th('Actions', 'small');
    }

    public function tdActions($model)
    {
        return $this->td(
            $this->actionButton('user', $model, 'user', 'info') .
            $this->actionButton('user/edit', $model, 'pencil', 'warning') .
            $this->actionButton('user/delete', $model, 'trash', 'danger'),
            'small'
        );
    }
}