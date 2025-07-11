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
    // $json = new Users;
    // var_dump($json->create($data));
    // var_dump($json->update(['id'=>5],['name'=>'abbas']));
    // var_dump($json->delete(['id'=>5]));
    // var_dump($json->get(['id','name'],['id'=>5]));
    // var_dump($json->find(10);
    // var_dump($json->getAll());

    $mysql = new Users;
    // var_dump($mysql->create(['name'=>'aabbas','email'=>'chitsazi50@gmail.com','password'=>56]));
    // var_dump($mysql->get(['name','id'],['id'=>'3']));
    // var_dump($mysql->find(5));
    // var_dump($mysql->update(['name'=>'reza'],['id'=>2]));
    // var_dump($mysql->delete(['id'=>2]));
    var_dump($mysql->getAll());
    
});
