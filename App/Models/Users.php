<?php

namespace App\Models;

use App\Models\Contracts\JsonBaseModel;
use App\Models\Contracts\MysqlBaseModel;

class Users extends MysqlBaseModel
{
    protected $table = 'users';
    
}
