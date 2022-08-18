<?php

namespace Views;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Views
{
    public static function view()
    {
        $request = new Request();
    }

    public function render(Request $request): Response
    {
        extract($request->attributes->all(), EXTR_SKIP);
        ob_start();
        require_once sprintf(__DIR__.'../../../src/pages/%s.php', $_route);
        return new Response(ob_get_clean());
    }
}