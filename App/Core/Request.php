<?php

namespace App\Core;

use App\Utilities\Url;

class Request
{
    private $params;
    private $routeParams;
    private $agent;
    private $ip;
    private $method;
    private $uri;

    public function __construct()
    {
        $this->params = $_REQUEST;
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
        $this->method =  $_SERVER['REQUEST_METHOD'];
        $this->ip =  $_SERVER['REMOTE_ADDR'];
        $this->uri =  strtok($_SERVER['REQUEST_URI'], '?');
    }
    public function input(string|int $input): string|null
    {
        return isset($this->params[$input]) ? $this->params[$input] : null;
    }
    public function has(string|int $key): string|null
    {
        return isset($this->params[$key]) ?? null;
    }
    public function redirect(string $route): void
    {
        header("Location: " . Url::siteUrl($route));
        die();
    }
    public function __get(string $name): string|null
    {
        return $this->params[$name] ?? null;
    }
    public function params()
    {
        return $this->params;
    }
    public function agent()
    {
        return $this->agent;
    }
    public function ip()
    {
        return $this->ip;
    }
    public function method()
    {
        return $this->method;
    }
    public function uri()
    {
        return $this->uri;
    }
    public function addRouteParam($key,$params) 
    {
        $this->routeParams[$key] = $params;
    }
    public function getRouteParam($key)
    {
        return $this->routeParams[$key];
    }
}
