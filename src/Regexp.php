<?php

namespace Cekta\Routing;

use Psr\Http\Message\RequestInterface;

class Regexp implements RouteInterface
{
    private $name;
    private $pattern;
    private $method;

    public function __construct(string $name, string $pattern, string $method = 'GET')
    {
        $this->name = $name;
        $this->pattern = $pattern;
        $this->method = $method;
    }

    public function isDispatchable(RequestInterface $request): bool
    {
        $result = false;
        if ($request->getMethod() === $this->method
            && preg_match($this->pattern, $request->getUri()->getPath())) {
            $result = true;
        }
        return $result;
    }
}