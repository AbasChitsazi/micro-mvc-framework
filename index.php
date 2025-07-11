<?php

use App\Core\Routing\Router;

include "Bootstrap/init.php";

if (isset($_GET['path']) && $_GET['path'] === '404') {
    view('Errors.404');
    exit;
}


$Router = new Router();

$Router->run();
