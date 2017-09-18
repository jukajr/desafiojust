<?php

$collector->get('/', ['App\Controllers\Site\IndexController', 'index']);

$collector->get('/post/{slug}', ['App\Controllers\Site\IndexController', 'post']);

$collector->get('controle', ['App\Controllers\Controle\LoginController', 'index']);
$collector->post('controle/login', ['App\Controllers\Controle\LoginController', 'login']);
$collector->get('controle/logout', ['App\Controllers\Controle\LoginController', 'logout']);

$collector->filter('auth', function () {
    if (!isset($_SESSION['user'])) {
        header('Location: /controle');

        return false;
    }
});
