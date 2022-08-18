<?php

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

function render_template($request): Response
{
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();
    require_once sprintf(__DIR__.'/../src/pages/%s.php', $_route);
    return new Response(ob_get_clean());
}

/**
 * Routes
 */
$routes = new Routing\RouteCollection();

$routes->add(
    'hello',
    new Routing\Route('/hello/{param}', [
        'param' => 'World!',
        '_controller' => function() use($request) {
            return render_template($request);
        }
    ])
);

$routes->add(
    'bye',
    new Routing\Route('/bye/{param}', [
        'param' => 'User',
        '_controller' => function() use($request) {
            return render_template($request);
        }
    ])
);

$routes->add(
    'leap_year',
    new Routing\Route('/is_leap_year/{year}', [
        'year' => null,
        '_controller' => 'Calendar\Controllers\LeapYearController::indexAction'
]));

return $routes;