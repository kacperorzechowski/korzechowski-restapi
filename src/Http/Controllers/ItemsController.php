<?php

namespace Korzechowski\RestApi\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Korzechowski\RestApi\Services\Item\CreateItem;
use Korzechowski\RestApi\Services\Item\DeleteItem;
use Korzechowski\RestApi\Services\Item\ListItems;
use Korzechowski\RestApi\Services\Item\UpdateItem;

class ItemsController extends Controller
{
    public function index(Request $request)
    {
        return ListItems::run($request);
    }

    public function create(Request $request)
    {
        return CreateItem::run($request);
    }

    public function update(Request $request, $id)
    {
        return UpdateItem::run($request, $id);
    }

    public function delete(int $id)
    {
        return DeleteItem::run($id);
    }
}
