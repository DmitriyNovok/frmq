<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/bootstrap/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();