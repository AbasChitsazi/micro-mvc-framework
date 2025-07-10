<?php

namespace App\Models\Contracts;


abstract class BaseModel implements CrudInterface
{
    protected $connection;
    protected $table;
    protected $primeryKey = 'id';
    protected $pagesize;
    protected $attributes;

    protected function __construct() {}

    protected function getAttributes($key)
    {
        if (!$key || !array_key_exists($key,$this->attributes)) {
            return;
        }
        return $this->attributes[$key];
    }
}
