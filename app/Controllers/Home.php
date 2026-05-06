<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Home';
        $data['content'] = view('home_view');
        return view('base_layout', $data);
    }
}
