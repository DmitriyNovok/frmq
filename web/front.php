<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../init.php';

$map = [
    '/hello' => __DIR__.'/../src/pages/hello.php',
    '/bye'   => __DIR__.'/../src/pages/bye.php',
    '/test'   => __DIR__.'/../src/pages/test.php',
];

$path = $request->getPathInfo();
if (isset($map[$path])) {
    ob_start();
    include $map[$path];
    $response->setContent(ob_get_clean());
} else {
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}

$response->send();