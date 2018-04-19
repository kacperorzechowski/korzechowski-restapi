<?php

$namespace = "Korzechowski\RestApi\Http\Controllers";

Route::group([
    "namespace" => $namespace,
    "prefix" => "api/v1/items"
], function () {
    Route::get('/', "ItemsController@index");
    Route::get('/{id}', "ItemsController@show");

    Route::post('/', "ItemsController@store");
    Route::post('/searches', "ItemsController@search");

    Route::put('/{id}', "ItemsController@update");

    Route::delete('/{id}', "ItemsController@delete");
});