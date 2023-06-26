<?php

use Arfanasri\RadevFramework\System\Router;

$router = new Router();

$router->add('GET', '/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)', 'ProductController', 'categories');

$router->add('GET', '/', 'HomeController', 'index');
$router->add('GET', '/hello', 'HomeController', 'hello');
$router->add('GET', '/world', 'HomeController', 'world');

$router->run();