<?php

use Symfony\Component\Routing;

/**
 * Routes
 */
$routes = new Routing\RouteCollection();

$routes->add(
    'hello',
    new Routing\Route('/hello/{param}', [
        'param' => 'World!',
        '_controller' => 'Views\Views::render'
    ])
);

$routes->add(
    'bye',
    new Routing\Route('/bye/{param}', [
        'param' => 'User',
        '_controller' => 'Views\Views::render'
    ])
);

$routes->add(
    'leap_year',
    new Routing\Route('/is_leap_year/{year}', [
        'year' => null,
        '_controller' => 'Calendar\Controllers\LeapYearController::indexAction'
    ])
);

return $routes;