<?php

namespace App\Models;

use App\Models\Contracts\JsonBaseModel;
use App\Models\Contracts\MysqlBaseModel;

class Posts extends MysqlBaseModel
{
    protected $table = 'posts';
}