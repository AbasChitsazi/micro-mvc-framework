<?php

namespace App\Models\Contracts;

use App\Models\Contracts\BaseModel;
use Medoo\Medoo;

class MysqlBaseModel extends BaseModel
{
    public function __construct()
    {
        try {
            $this->connection = new Medoo(['type' => 'mysql', 'host' => $_ENV['DB_HOST'], 'database' =>  $_ENV['DB_NAME'], 'username' => $_ENV['DB_USER'], 'password' => $_ENV['DB_PASS']]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function create(array $data): int
    {
        $this->connection->insert($this->table,$data);
        return (int)$this->connection->id();
    }
    public function find($id): array|null|object
    {
        return $this->connection->get($this->table,"*", [$this->primeryKey => $id]);
        

    }
    public function get(array $columns, array $where) 
    {
        return $this->connection->get($this->table, $columns, $where);
    }
    public function getAll()
    {
        return $this->connection->select($this->table, "*");
    }
    public function update(array $data, array $where): int
    {
        $data = $this->connection->update($this->table,$data,$where);
        return $data->rowCount();
    }
    public function delete(array $where): int
    {
        $data =$this->connection->delete($this->table,$where);
        return $data->rowCount();
    }
}
