<?php

namespace Korzechowski\RestApi\Data\Repositories;

use Illuminate\Database\Eloquent\Model;
use Korzechowski\RestApi\Data\Interfaces\RepositoryInterface;

class ItemRepository implements RepositoryInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $items = $this->model->all();

        return response()->json([
            "data" => $items
        ]);
    }

    public function create(array $attributes)
    {
        $item = $this->model->create($attributes);

        return response()->json([
            "data" => $item
        ]);
    }

    public function update(array $attributes, $id)
    {
        $this->model->findOrFail($id)->update($attributes);

        $item = $this->model->findOrFail($id);

        return response()->json([
            "data" => $item
        ]);
    }

    public function delete($id)
    {
        $this->model->destroy($id);

        return response()->json(null, 204);
    }

    public function show($id)
    {
        $item = $this->model->findOrFail($id);

        return response()->json([
            "data" => $item
        ]);
    }

    public function search($columnName, $operator, $value)
    {
        $items = $this->model->where($columnName, $operator, $value)->get();

        return response()->json([
            "data" => $items
        ]);
    }
}