<?php

$collector->group(['before' => 'auth'], function ($collector) {

    $collector->get('controle/home', ['App\Controllers\Controle\HomeController', 'index']);

    $collector->get('controle/categoria', ['App\Controllers\Controle\CategoriaController', 'index']);
    $collector->get('controle/categoria/form/{id}?', ['App\Controllers\Controle\CategoriaController', 'form']);
    $collector->post('controle/categoria/save', ['App\Controllers\Controle\CategoriaController', 'save']);
    $collector->post('controle/categoria/update', ['App\Controllers\Controle\CategoriaController', 'update']);
    $collector->get('controle/categoria/delete/{id}', ['App\Controllers\Controle\CategoriaController', 'delete']);

    $collector->get('controle/post', ['App\Controllers\Controle\PostController', 'index']);
    $collector->get('controle/post/form/{id}?', ['App\Controllers\Controle\PostController', 'form']);
    $collector->post('controle/post/save', ['App\Controllers\Controle\PostController', 'save']);
    $collector->post('controle/post/update', ['App\Controllers\Controle\PostController', 'update']);
    $collector->get('controle/post/delete/{id}', ['App\Controllers\Controle\PostController', 'delete']);
});
