<?php

namespace App\Controllers;

class ArchiveController
{
    public function index()
    {
        $data = [
            'tasks' => ['firstTask','secodeTask','ThirdTask'],
        ];
        view('archive.index',$data);
    }
}