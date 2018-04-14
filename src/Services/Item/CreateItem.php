<?php

namespace Korzechowski\RestApi\Services\Item;

use Illuminate\Http\Request;
use Korzechowski\RestApi\Data\Item;

class CreateItem
{
    public static function run(Request $data)
    {
        $data = json_decode($data->getContent(), true);

        $item = Item::create($data);

        return response()->json([
            "data" => $item
        ]);
    }
}