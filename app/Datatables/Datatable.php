<?php namespace App\Datatables;

class Datatable
{
    protected $columns = [];

    protected $data;

    protected $increment = 0;

    public function setData(\IteratorAggregate $data)
    {
        $this->data = $data;
    }

    public function show()
    {
        $result = null;

        foreach ($this->data as $row) {

            $this->increment ++;

            $result .= '<tr>' . PHP_EOL;

            foreach ($this->columns as $column) {

                $method = studly_case($column);

                if (method_exists($this, $method)) {
                    $result .= call_user_func([ $this, $method ], $row->id);
                } else {
                    $result .= '<td>' . $row->$column . '</td>' . PHP_EOL;
                }
            }

            $result .= '</tr>';
        }

        return $result;
    }
}