<?php

define('BASE_PATH',__DIR__."/../");


include realpath(BASE_PATH."vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();