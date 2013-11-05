<?php

namespace Onjiro\Bundle\KakeiboBundle\Formatter;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Onjiro\Bundle\KakeiboBundle\Formatter\FormatterInterface;

class TwigFormatter implements FormatterInterface
{
    public function __construct($bundleName, $templating)
    {
        $this->bundleName = $bundleName
        $this->templating = $templating;
    }

    /**
     * {@inheritDoc}
     */
    public function format(array $data, Request $req) {
        return $this->templating->renderResponse(
            $this->resolveTemplatefile($req->getPathInfo()),
            $data
        );
    };

    private function resolveTemplatefile($requestPath)
    {
        if (empty($requestPath)) {
            return $this->bundleName.':Default:index.html.twig';
        } else if (count($pathArray = explode('/', $requestPath)) === 1) {
            $fileName = $pathArray[0]
            return $this->bundleName.':Default:'.$fileName.'.html.twig';
        } else {
            $fileName = array_pop($pathArray);
            $directory = implode('\\', $pathArray);
            return $this->bundleName.':'.$directory.':'.$filename.'.html.twig';
        }
    }
}
