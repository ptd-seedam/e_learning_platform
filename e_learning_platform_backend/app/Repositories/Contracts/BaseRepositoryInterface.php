<?php

namespace App\Repositories\Contracts;

interface BaseRepositoryInterface
{
    public function getAll(array $columns = ['*']);
    public function find($id, array $columns = ['*']);
    public function findOrFail($id, array $columns = ['*']);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
