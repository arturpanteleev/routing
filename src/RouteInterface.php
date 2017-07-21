<?php

namespace Cekta\Routing;

use Psr\Http\Message\RequestInterface;

interface RouteInterface
{
    public function isDispatchable(RequestInterface $request): bool;
}