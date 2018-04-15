<?php

namespace Korzechowski\RestApi\Services\Item;

use Illuminate\Http\Request;
use Korzechowski\RestApi\Data\Item;
use Korzechowski\RestApi\Services\Validator\ValidateAmount;

class ListItems
{
    public static function run(Request $request)
    {
        if ($request->has("amount")) {
            $queryAttributes = ValidateAmount::validate($request->get("amount"));

            if (!$queryAttributes) {
                return response()->json("Validation error", 500);
            }

            $items = Item::where("amount", $queryAttributes["operator"], $queryAttributes["amount"])->get();
        } else {
            $items = Item::all();
        }

        return response()->json([
            "data" => $items
        ]);
    }
}