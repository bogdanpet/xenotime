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

    public function thAuthor()
    {
        return $this->th('Author', 'small');
    }

    public function tdAuthor($model)
    {
        return $this->td($model->user->name, 'small');
    }

    public function thActions()
    {
        return $this->th('Actions', 'small');
    }

    public function tdActions($model)
    {
        return $this->td(
            $this->actionButton('post/edit', $model, 'pencil', 'warning') .
            $this->actionButton('post/delete', $model, 'trash', 'danger'),
            'small'
        );
    }
}
