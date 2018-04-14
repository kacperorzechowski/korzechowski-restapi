<?php

namespace Korzechowski\RestApi\Data;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'name', 'amount'];
}