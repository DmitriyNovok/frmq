<?php

use src\Http\Controllers\LeapYearController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

function render_template($request): Response
{
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();
    require_once sprintf(__DIR__.'/../src/pages/%s.php', $_route);
    return new Response(ob_get_clean());
}

function is_leap_year($year = null): bool
{
    if (null === $year) {
        $year = date('Y');
    }
    return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
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
        '_controller' => [new LeapYearController(), 'indexAction']
]));

return $routes;