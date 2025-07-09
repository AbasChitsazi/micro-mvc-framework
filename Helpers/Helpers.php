<?php

function view($filename,$data=[])
{
    extract($data);
    $filename = str_replace('.', '/', $filename);
    $filename = BASE_PATH . "/Views/" . $filename . ".php";
    if (file_exists($filename)) {
        include_once $filename;
    }
    return null;
}
