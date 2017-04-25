<?php namespace App\Datatables;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Datatable
{
    protected $columns = [];

    protected $data;

    protected $increment = 0;

    protected static $instance = null;

    public function __construct()
    {
        self::$instance = $this;
    }

    public static function render(\IteratorAggregate $data, array $columns, array $table_attributes = [ 'class' => 'table' ])
    {
        self::$instance->setData($data);
        self::$instance->columns = $columns;

        $result = self::$instance->show($table_attributes);

        return $result;
    }

    public function setData(\IteratorAggregate $data)
    {
        $this->data = $data;
    }

    public function show(array $table_attributes = [ 'class' => 'table' ])
    {
        $result = $this->open($table_attributes) . PHP_EOL;
        $result .= $this->tableHead() . PHP_EOL;
        $result .= $this->tableBody() . PHP_EOL;
        $result .= $this->tableFoot() . PHP_EOL;
        $result .= $this->close();
        $result .= $this->pagination();

        return $result;
    }

    public function open(array $attributes = [ 'class' => 'table' ])
    {
        $attr = null;

        foreach ($attributes as $key => $value) {
            if (is_integer($key)) {
                $attr .= ' ' . $value;
            } else {
                $attr .= ' ' . $key . '="' . $value . '"';
            }
        }

        $result = '<table' . $attr . '>';

        return $result;
    }

    public function tableHead()
    {
        $result = '<thead>' . PHP_EOL;
        $result .= '<tr>' . PHP_EOL;

        foreach ($this->columns as $column) {
            $method = 'th' . studly_case($column);

            if (method_exists($this, $method)) {
                $result .= call_user_func([ $this, $method ]);
            } else {
                $result .= $this->th($column);
            }
        }

        $result .= '</tr>' . PHP_EOL;
        $result .= '</thead>';

        return $result;
    }

    public function tableBody()
    {

        $this->setIncrement();

        $result = '<tbody>' . PHP_EOL;

        foreach ($this->data as $model) {

            $this->increment ++;

            $result .= '<tr>' . PHP_EOL;

            foreach ($this->columns as $column) {
                $method = 'td' . studly_case($column);

                if (method_exists($this, $method)) {
                    $result .= call_user_func([ $this, $method ], $model);
                } else {
                    $result .= $this->td($model->$column);
                }
            }

            $result .= '</tr>' . PHP_EOL;
        }

        $result .= '</tbody>';

        return $result;
    }

    public function tableFoot()
    {
        if ($this->data instanceof LengthAwarePaginator) {
            $total = $this->data->total();
            $min   = 1 + ($this->data->currentPage() - 1) * $this->data->perPage();
            $max   = $this->data->currentPage() * $this->data->perPage();
            if ($max > $total) {
                $max = $total;
            }
        } else {
            $total = $this->data->count();
            $min   = 1;
            $max   = $this->data->count();
        }

        $result = '<tfoot><tr class="active"><td colspan="100%" class="text-center">' . $min . ' - ' . $max . ' / ' . $total . '</td></tr></tfoot>';

        return $result;
    }

    public function close()
    {
        return '</table>';
    }

    public function pagination($class = 'panel-footer text-center')
    {
        if ($this->data instanceof LengthAwarePaginator) {
            return '<div class="' . $class . '">' . $this->data->links() . '</div>';
        }

        return null;
    }

    protected function th($data, $class = 'large')
    {
        return '<th class="' . $class . '">' . ucfirst($data) . '</th>' . PHP_EOL;
    }

    protected function td($data, $class = 'large')
    {
        return '<td class="' . $class . '">' . $data . '</td>' . PHP_EOL;
    }

    protected function setIncrement()
    {
        if ($this->data instanceof LengthAwarePaginator) {
            $this->increment = ($this->data->currentPage() - 1) * $this->data->perPage();
        }
    }

    protected function actionButton($resource, $model, $icon, $context_class = 'default')
    {
        return '<a href="' . admin_url($resource . '/' . $model->id) . '" class="btn btn-sm btn-' . $context_class . '"><i class="fa fa-' . $icon . '"></i></a>' . PHP_EOL;
    }

    public function thRowNum()
    {
        return $this->th('#', 'small');
    }

    public function tdRowNum()
    {
        return $this->td($this->increment, 'small');
    }

    public function thId()
    {
        return $this->th('ID', 'small');
    }

    public function tdId($model)
    {
        return $this->td($model->id, 'small');
    }
}