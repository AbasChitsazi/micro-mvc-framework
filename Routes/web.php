<?php

namespace Routers;


use App\Core\Routing\Route;
use App\Middleware\BlockFireFox;
use App\Middleware\BlockIE;
use App\Models\Users;

Route::GET('/', "HomeController@index");

Route::GET('/post', "PostController@index");
Route::GET('/post/', "PostController@index");
Route::GET('/post/{pid}', "PostController@single");
Route::GET('/post/{pid}/comment/{cid}', "PostController@comment");


Route::GET('/archive', "ArchiveController@index", [BlockIE::class]);

Route::GET('/test', function () {
    // $data = [
    //     "id"=>rand(4,1000),
    //     "name"=>"sara",
    //     "family"=>"saraei",
    //     "job"=>"SEO Manager"
    // ];
    // $users = new Users;
    // var_dump($users->update(['id'=>5],['name'=>'abbas']));
    // var_dump($users->delete(['id'=>5]));
    // var_dump($users->get(['id','name'],['id'=>5]));
    // var_dump($users->find(10);
    // var_dump($users->getAll());
});
