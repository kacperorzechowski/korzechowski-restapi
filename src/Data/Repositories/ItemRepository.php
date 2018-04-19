<?php

namespace Korzechowski\RestApi\Data\Repositories;

use Illuminate\Database\Eloquent\Model;

class ItemRepository extends Repository
{
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

    public function search($columnName, $operator, $value)
    {
        return $this->model->where($columnName, $operator, $value)->get();
    }
}