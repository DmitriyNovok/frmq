<?php

require_once __DIR__.'/../vendor/autoload.php';

use Frmq\Engine;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing;
use Symfony\Component\HttpKernel;

$request = Request::createFromGlobals();
$routes = require_once __DIR__.'/../src/app.php';

$context = new Routing\RequestContext();
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

$controllerResolver = new HttpKernel\Controller\ControllerResolver();
$argumentResolver = new HttpKernel\Controller\ArgumentResolver();

$engine = new Engine($matcher, $controllerResolver, $argumentResolver);
$response = $engine->handle($request);

$response->send();