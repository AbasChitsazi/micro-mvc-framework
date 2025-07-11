<?php

 namespace App\Models\Contracts;

 interface CrudInterface
 {
    public function create(array $data): int;
    public function find($id):object|null|array;
    public function get(array $columns,array $where);
    public function update(array $data, array $where):int;
    public function delete(array $where):int;
 }