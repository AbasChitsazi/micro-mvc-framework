<?php

namespace Routers;


use App\Core\Routing\Route;
use App\Middleware\BlockFireFox;
use App\Middleware\BlockIE;

Route::GET('/',"HomeController@index");


Route::GET('/archive',"ArchiveController@index",[BlockIE::class]);

Route::GET('/test',function(){
    var_dump(Route::routes());
});