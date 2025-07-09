<?php

namespace App\Middleware;

use App\Middleware\Contract\MiddlewareInterface;
use App\Services\IpApi\IpApi;

class GlobalMiddleware implements MiddlewareInterface
{
    private $ipapi;
    public function __construct()
    {
        $this->ipapi = new IpApi();
    }
    public function handle()
    {
        global $request;
        $this->ipapi->sendRequest($request);
        
    }
}
