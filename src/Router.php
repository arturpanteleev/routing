<?php

namespace Cekta\Routing;

use Psr\Http\Message\RequestInterface;

class Router implements RouterInterface
{
    private $routes;

    public function __construct(RouteInterface ... $routes)
    {
        $this->routes = $routes;
    }

    public function dispatch(RequestInterface $request): RouteInterface
    {
        $result = null;
        foreach ($this->routes as $route) {
            if ($route->isDispatchable($request)) {
                $result = $route;
                break;
            }
        }

        if (empty($result)) {
            // todo Сделать свои классы исключений
            throw new NotFoundException('Cant find route for request');
        }
        return $result;
    }

}