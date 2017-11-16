<?php

use App\Components\Router;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/config.php';
require __DIR__ . '/../app/Helpers/functions.php';

debug($_SERVER);
$router = Router::getInstance();

$controller = $router->getController();

$action = $router->getAction();
dd([$controller, $action]);
$controller = new $controller;
$controller->$action();

