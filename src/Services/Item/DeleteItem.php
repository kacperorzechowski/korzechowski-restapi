<?php

namespace Korzechowski\RestApi\Services\Item;

use Korzechowski\RestApi\Data\Item;

class DeleteItem
{
    public static function run(int $id)
    {
        Item::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}