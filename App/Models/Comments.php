<?php

namespace App\Models;

use App\Models\Contracts\JsonBaseModel;
use App\Models\Contracts\MysqlBaseModel;

class Comments extends MysqlBaseModel
{
    protected $table = 'comments';
}