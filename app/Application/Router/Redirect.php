<?php

namespace App\Application\Router;

class Redirect
{
    public static function to(string $route) :void
    {
        header("Location: $route");
        die();
    }
}