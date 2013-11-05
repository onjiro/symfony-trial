<?php

namespace Onjiro\Bundle\KakeiboBundle\Formatter;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Onjiro\Bundle\KakeiboBundle\Formatter\FormatterInterface;

class JsonFormatter implements FormatterInterface
{
    public function __construct()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function format(array $data, Request $req) {
        return new JsonResponse($data);
    };
}







