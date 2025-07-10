<?php

namespace App\Core\Routing;

use App\Core\Request;


use Exception;

class Router
{
    private $request;
    private $routes;
    private $current_route;

    public function __construct()
    {
        $this->request = new Request();
        $this->routes = Route::routes() ?? [];
        $this->current_route = $this->findRoute($this->request) ?? null;
        $this->runGlobalMiddleWare();
        $this->runRouteMiddleware();
    }
    private function runRouteMiddleware()
    {

        if (empty($this->current_route['middleware'])) {
            return;
        }
        foreach ($this->current_route['middleware'] as $middlware) {
            $classname = $middlware;
            if (!class_exists($classname)) {
                throw new Exception("Class $classname Not Exist");
            }
            $middlware = new $classname();
            $middlware->handle();
        }
    }
    private function runGlobalMiddleWare()
    {
        $globalmiddelware = new \App\Middleware\GlobalMiddleware;
        $globalmiddelware->handle($this->request);
    }
    public function findRoute(Request $request)
    {
        foreach ($this->routes as $route) {
            if (!in_array($request->method(), $route['methods'])){
                return false;
            }
            if($this->regexMatched($route)) {
                return $route;
            }
        }
        return null;
    }
    private function regexMatched($route)
    {
        global $request;
        $pattern = "/^" . str_replace(['/', '{', '}'], ['\/', '(?<', '>[-%\w]+)'], $route['uri']) . "$/";
        $result = preg_match($pattern,$this->request->uri(),$matchs);
        if(!$result){
            return false;
        }
        foreach ($matchs as $key => $match) {
            if(!is_int($key)){
                $request->addRouteParam($key,$match);
            }
        }
        return true;
    }
    public function run()
    {

        if (is_null($this->current_route)) {
            if ($this->hasUriButInvalidMethod()) {
                $this->dispatch405();
            }
            $this->dispatch404();
        }


        $this->dispatch();
    }
    private function dispatch()
    {
        $action = $this->current_route['action'];
        if (is_null($action) || empty($action)) {
            throw new Exception("Action Can Not Be Null");
        }

        if (is_callable($action)) {
            $action();
            return;
        }

        if (is_string($action)) {
            $action = explode('@', $action);
        }
        if (is_array($action)) {
            $classname = 'App\Controllers\\' . $action[0];
            if (!class_exists($classname)) {
                throw new Exception("Class $classname Not Exist");
            }
            $controller = new $classname();

            $method = $action[1];
            if (!method_exists($controller, $method)) {
                throw new Exception("Method '$method' does not exist in controller '$classname'");
            }
            call_user_func([$controller, $method]);
            return;
        }
        throw new Exception("Invalid action type in route definition.");
    }
    private function hasUriButInvalidMethod()
    {
        foreach ($this->routes as $route) {
            if ($this->request->uri() === $route['uri'] && !in_array($this->request->method(), $route['methods'])) {
                return true;
            }
        }
        return false;
    }
    private function dispatch405()
    {
        header("HTTP/1.1 405 Method Not Allowed");
        view('Errors.405');
        die();
    }
    private function dispatch404()
    {
        header("HTTP/1.1 404 Not Found");
        view('Errors.404');
        die();
    }
}
