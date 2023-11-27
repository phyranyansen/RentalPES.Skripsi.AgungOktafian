<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HomeUser extends BaseController
{
    public function index()
    {
         $content = [
            'title'     => 'Gamebox',
            'page'      => view('front/home/home_page')
        ];
        
        return view('templates/frontEnd/index', $content);
    }
}