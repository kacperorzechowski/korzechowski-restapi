<?php

namespace Korzechowski\RestApi\Data;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;

    protected $searchable = ["id", "amount"];
    protected $fillable = ["id", "name", "amount"];

    public static function getSearchable()
    {
        $item = new self;

        return $item->searchable;
    }
}