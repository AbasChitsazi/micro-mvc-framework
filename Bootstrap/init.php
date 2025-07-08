<?php

define('BASE_PATH',__DIR__."/../");
include BASE_PATH."/vendor/autoload.php";


$request = new App\Core\Request;
include BASE_PATH."/Routes/web.php";

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();


