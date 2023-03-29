<?php

namespace Lok\System\RoutesConfig;
class RoutesReader
{
    public function readRoutes(): array
    {
        return require_once __DIR__ . "/../../app/Routes/routes.php";
    }

    public function showRoutes(): void
    {
        $routes = $this->readRoutes();
        foreach ($routes as $path => $controller) {
            $controller = get_class($controller);
            echo "{$path} => {$controller}" . PHP_EOL;
        }
    }



}