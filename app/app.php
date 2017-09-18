<?php
session_start();

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;

$collector = new RouteCollector();

include 'routes/site.php';
include 'routes/controle.php';

$dispatcher = new Dispatcher($collector->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

echo $response;
