<?php

namespace App\Controllers;

class PostController
{
    public function single()
    {
        global $request;
        $post_id = $request->getRouteParam('pid');
        $data =
            [
                "post_id" => $post_id
            ];
        view("post.index", $data);
    }
}
