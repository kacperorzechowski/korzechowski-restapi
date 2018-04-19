<?php

namespace Korzechowski\RestApi\Data\Interfaces;

interface RepositoryInterface
{
    public function all();

    public function create(array $attributes);

    public function update(array $attributes, $id);

    public function delete($id);

    public function show($id);
}