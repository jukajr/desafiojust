<?php

use Spatie\Blade\Blade;

function view()
{
    $views = __DIR__ . '/Views';
    $cache = __DIR__ . '/Cache';

    $blade = new Blade($views, $cache);

    return $blade->view();
}
