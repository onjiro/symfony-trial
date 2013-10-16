<?php

namespace Onjiro\Bundle\KakeiboBundle\Util;

class RequestContext
{
    private $container = array();

    public function __construct()
    {
    }

    public function set($key, $value)
    {
        $this->container[$key] = $value;
    }

    public function get($key)
    {
        return (array_key_exists($key, $this->container)) ?
            $this->container[$key]:
            null;
    }
}