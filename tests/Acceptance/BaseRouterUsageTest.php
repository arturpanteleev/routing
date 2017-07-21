<?php

namespace Cekta\Routing\Tests\Acceptance;

use Cekta\Routing\Route;
use Cekta\Routing\Router;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

class BaseRouterUsageTest extends TestCase
{
    public function testDispatch()
    {
        $request = new Request('get', '/');
        $route = new Route('index', '/');
        $router = new Router($route);
        $result = $router->dispatch($request);

        $this->assertSame($route, $result);
    }

    /**
     * @expectedException \Cekta\Routing\NotFoundExceptionInterface
     */
    public function testInvalidDispatch()
    {
        $request = new Request('get', '/');
        $router = new Router;
        $router->dispatch($request);
    }
}