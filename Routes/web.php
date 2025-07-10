<?php

namespace Routers;


use App\Core\Routing\Route;
use App\Middleware\BlockFireFox;
use App\Middleware\BlockIE;

Route::GET('/', "HomeController@index");

Route::GET('/post', "PostController@index");
Route::GET('/post/', "PostController@index");
Route::GET('/post/{pid}', "PostController@single");
Route::GET('/post/{pid}/comment/{cid}', "PostController@comment");


Route::GET('/archive', "ArchiveController@index", [BlockIE::class]);

Route::GET('/test', function () {

});
