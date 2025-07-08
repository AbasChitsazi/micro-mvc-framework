<?php

use App\Core\Routing\Router;

include "Bootstrap/init.php";


$Router = new Router();

var_dump($Router->findRoute($request));
