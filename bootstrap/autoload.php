<?php

spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../../../' . lcfirst(\str_replace(['_', '\\'], '/', $class)) . '.php';

    if (\file_exists($file)) {
        require_once $file;
    }
});