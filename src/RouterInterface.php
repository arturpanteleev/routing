<?php

namespace Cekta\Routing;

use Psr\Http\Message\RequestInterface;

interface RouterInterface
{
    /**
     * @param RequestInterface $request
     * @return RouteInterface
     * @throws NotFoundExceptionInterface если нет подходящего Route
     */
    public function dispatch(RequestInterface $request): RouteInterface;
}