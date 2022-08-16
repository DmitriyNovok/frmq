<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add(
    'hello',
    new Routing\Route('/hello/{param}', [
        'param' => 'World'
    ])
);

$routes->add(
    'bye',
    new Routing\Route('/bye/{param}', [
        'param' => 'User'
    ])
);

return $routes;