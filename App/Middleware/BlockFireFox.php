<?php

namespace App\Middleware;

use App\Middleware\Contract\MiddlewareInterface;
use hisorange\BrowserDetect\Parser as Browser;

class BlockFireFox implements MiddlewareInterface
{
    public function handle()
    {
        if(Browser::isFirefox()){
            view('Blocks.firefox.index');
            exit;
        }
    }
}