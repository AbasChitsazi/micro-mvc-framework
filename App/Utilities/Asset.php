<?php

namespace App\Utilities;

class Asset
{
    public static function __callStatic(string $name,array $argument):string
    {
        return $_ENV['HOST'] . "Assets/$name/" . implode(',',$argument);
    }
    
}