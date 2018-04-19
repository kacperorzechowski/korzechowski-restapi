<?php

namespace Korzechowski\RestApi\Data\Repositories;

use Illuminate\Database\Eloquent\Model;
use Korzechowski\RestApi\Data\Interfaces\RepositoryInterface;

abstract class Repository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes, $id)
    {
        $this->model->findOrFail($id)->update($attributes);

        return $this->model->findOrFail($id);
    }

    public function delete($id)
    {
        $this->model->findOrFail($id)->delete();
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }
}