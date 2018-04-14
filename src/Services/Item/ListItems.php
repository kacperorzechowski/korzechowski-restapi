<?php

namespace Korzechowski\RestApi\Services\Item;

use Illuminate\Http\Request;
use Korzechowski\RestApi\Data\Item;

class ListItems
{
    public static function run(Request $request)
    {
        $items = Item::all();

        return response()->json([
            "data" => $items
        ]);
    }
}