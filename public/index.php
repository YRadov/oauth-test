<?php
session_start();
use App\Components\Router;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/config.php';
require __DIR__ . '/../app/Helpers/functions.php';

$router = Router::getInstance();

$controller = $router->getController();

$action = $router->getAction();

$controller = new $controller;
$controller->$action();

