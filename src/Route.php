<?php

namespace Cekta\Routing;

class Route extends Regexp
{
    public function __construct($name, $wildcard, $method = 'GET')
    {
        $wildcard = str_replace('/', '\/', $wildcard);  // todo Удалить
        $pattern = '/' . $wildcard . '/i';
        parent::__construct($name, $pattern, $method);
    }

}