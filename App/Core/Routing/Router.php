<?php

namespace App\Core\Routing;

use App\Core\Request;

class Router
{
    private $request;
    private $routes;
    private $current_route;

    public function __construct()
    {
        $this->request = new Request();
        $this->routes = Route::routes();
        $this->current_route = $this->request->uri() ?? null;
    }
    public function findRoute(Request $request)
    {
        foreach ($this->routes as $r) {
            if (in_array($request->method(),$r['methods']) && $request->uri() == $r['uri']){
                return $r;
            }
                
        }
        return null;
    }
    public function run()
    {
        
    }
}
