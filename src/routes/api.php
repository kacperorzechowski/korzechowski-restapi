<?php

$namespace = "Korzechowski\RestApi\Http\Controllers";

Route::group([
    "namespace" => $namespace,
    "prefix" => "api/items"
], function () {
    Route::get('/', "ItemsController@index");
    Route::post('/', "ItemsController@create");
    Route::put('/{id}', "ItemsController@update");
    Route::delete('/{id}', "ItemsController@delete");
});