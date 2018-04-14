<?php

namespace Korzechowski\RestApi\Services\Item;

use Illuminate\Http\Request;
use Korzechowski\RestApi\Data\Item;

class UpdateItem
{
    public static function run(Request $request, int $id)
    {
        $data = json_decode($request->getContent(), true);

        $item = Item::findOrFail($id);

        $item->name = $data["name"];
        $item->amount = $data["amount"];
        $item->save();

        return response()->json([
            "data" => $item
        ]);
    }
}