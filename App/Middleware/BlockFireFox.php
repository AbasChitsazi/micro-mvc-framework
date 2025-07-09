<?php

namespace App\Middleware;

use App\Contract\Middleware\MiddlewareInterface;

class BlockFireFox implements MiddlewareInterface
{
    public function handle()
    {
        global $request;
        var_dump($request);
    }
}