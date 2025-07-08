<?php

namespace App\Utilities;

class Url
{
    public static function current():string
    {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http') . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }
    public static function segments():object
    {
        return (object)[
            'SCHEME' => $_SERVER['REQUEST_SCHEME'],
            'HOST' => $_SERVER['HTTP_HOST'],
            'URI' => strtok($_SERVER['REQUEST_URI'],'?'),
            'FULL_URI' => $_SERVER['REQUEST_URI'],
            'RAW_QUERY' => $_SERVER['QUERY_STRING'],
            'QUERY' => isset($_GET) && !is_null($_GET) ? ($_GET) : null
        ];
    }
    public static function siteUrl(string $route):string
    {
        return $_ENV['HOST'].$route;
    }
}
