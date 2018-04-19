<?php

namespace Korzechowski\RestApi\Http\Controllers;

use App\Http\Controllers\Controller;
use Korzechowski\RestApi\Data\constants\HTTP_STATUS_CODES;
use Korzechowski\RestApi\Data\Item;
use Korzechowski\RestApi\Data\Repositories\ItemRepository;
use Korzechowski\RestApi\Http\Requests\SearchItemRequest;
use Korzechowski\RestApi\Http\Requests\StoreItemRequest;
use Korzechowski\RestApi\Http\Requests\UpdateItemRequest;

class ItemsController extends Controller
{
    private $itemRepository;

    public function __construct(Item $item)
    {
        $this->itemRepository = new ItemRepository($item);
    }

    public function index()
    {
        return response()->json([
            "data" => $this->itemRepository->all()
        ]);
    }

    public function store(StoreItemRequest $request)
    {
        $validData = $request->validated();
        $item = $this->itemRepository->create($validData);

        return response()->json([
            "data" => $item
        ], HTTP_STATUS_CODES::HTTP_CREATED);
    }

    public function update(UpdateItemRequest $request, int $id)
    {
        $validData = $request->validated();
        $item = $this->itemRepository->update($validData, $id);

        return response()->json([
            "data" => $item
        ], HTTP_STATUS_CODES::HTTP_ACCEPTED);
    }

    public function delete(int $id)
    {
        $this->itemRepository->delete($id);

        return response()->json([
            "data" => null
        ], HTTP_STATUS_CODES::HTTP_NO_CONTENT);
    }

    public function show(int $id)
    {
        return response()->json([
            "data" => $this->itemRepository->show($id)
        ]);
    }

    public function search(SearchItemRequest $request)
    {
        $validData = $request->validated();

        return response()->json([
            "data" => $this->itemRepository->search(
                $validData["columnName"],
                $validData["operator"],
                $validData["value"]
            )
        ], HTTP_STATUS_CODES::HTTP_ACCEPTED);
    }
}
