<?php

namespace Onjiro\Bundle\KakeiboBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use Onjiro\Bundle\KakeiboBundle\DependencyInjection\Compiler\ResponseFormatterPass;

class OnjiroKakeiboBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ResponseFormatterPass());
    }
}








