<?php

namespace App\Application\Views;

class View
{
    public static function show(string $view) :void
    {
        $path = __DIR__ . "/../../../views/$view.php";
        include $path;
    }
}