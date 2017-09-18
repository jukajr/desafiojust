<?php

namespace App\Controllers\Controle;

class HomeController
{
    public function index()
    {
        return view()->make('controle.home.index');
    }
}
