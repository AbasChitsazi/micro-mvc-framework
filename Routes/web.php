<?php

namespace Routers;


use App\Core\Routing\Route;


Route::GET('/a','HomeController@index');
Route::POST('/b','HomeController@index');
Route::PUT('/c','HomeController@index');
Route::GET('/d',function(){
    echo "hello d";
});


