<?php

define('BASE_PATH',__DIR__."/../");
include BASE_PATH."/vendor/autoload.php";
include BASE_PATH."/Configs/config.php";
$request = new App\Core\Request;
include BASE_PATH."/Routes/web.php";
include BASE_PATH."/Helpers/Helpers.php";
$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();


