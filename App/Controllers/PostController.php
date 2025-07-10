<?php

namespace App\Controllers;

class PostController
{
    public function index()
    {
        view('post.index');
    }
    public function single()
    {
        global $request;
        $post_id = $request->getRouteParam('pid');
        $data =
            [
                "post_id" => $post_id,
            ];
        view("post.single", $data);
    }
    public function comment()
    {
        global $request;
        $post_id = $request->getRouteParam('pid');
        $comment_id = $request->getRouteParam('cid');
        $data =
            [
                "post_id" => $post_id,
                "comment_id" => $comment_id
            ];
        view("post.comment", $data);
    }
}
