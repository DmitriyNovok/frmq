<?php

$name = $request->attributes->get('name', 'World') ?>
    Hello <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>