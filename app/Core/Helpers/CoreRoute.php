<?php

namespace App\Core\Helpers;

use Illuminate\Support\Facades\Route;

class CoreRoute
{
    public static function getRouteOptions()
    {
        $routes = Route::getRoutes();
        $options = [];

        foreach ($routes as $route) {
            $name = $route->getName();
            $methods = $route->methods();
            $uri = $route->uri();

            if ($name && in_array('GET', $methods) && !str_contains($uri, '{')) {
                $options[$name] = $name;
            }
        }

        return $options;
    }
}
