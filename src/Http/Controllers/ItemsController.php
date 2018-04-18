<?php

namespace Korzechowski\RestApi\Http\Controllers;

use App\Http\Controllers\Controller;
use Korzechowski\RestApi\Data\Item;
use Korzechowski\RestApi\Data\Repositories\ItemRepository;
use Korzechowski\RestApi\Http\Requests\SearchItemRequest;
use Korzechowski\RestApi\Http\Requests\StoreItemRequest;
use Korzechowski\RestApi\Http\Requests\UpdateItemRequest;

class ItemsController extends Controller
{
    private $model;

    public function __construct(Item $item)
    {
        $this->model = new ItemRepository($item);
    }

    public function index()
    {
        return $this->model->all();
    }

    public function store(StoreItemRequest $request)
    {
        $validData = $request->validated();

        return $this->model->create($validData);
    }

    public function update(UpdateItemRequest $request, int $id)
    {
        $validData = $request->validated();

        return $this->model->update($validData, $id);
    }

    public function delete(int $id)
    {
        return $this->model->delete($id);
    }

    public function show(int $id)
    {
        return $this->model->show($id);
    }

    public function search(SearchItemRequest $request)
    {
        $validData = $request->validated();

        return $this->model->search($validData["columnName"], $validData["operator"], $validData["value"]);
    }
}
