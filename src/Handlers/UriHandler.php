<?php

namespace Lok\System\Handlers;

use Lok\System\RoutesConfig\RoutesReader;

class UriHandler
{
    public static function getController(string $uri)
    {
        $routes = new RoutesReader();
        $routes = $routes->readRoutes();
        return $routes[$uri];
    }
}