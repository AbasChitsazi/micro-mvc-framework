<?php

namespace Routers;


use App\Core\Routing\Route;


Route::GET('/',"HomeController@index");

Route::GET('/test',function(){
    view("archive.index");
});

Route::GET('/archive',"ArchiveController@index");
