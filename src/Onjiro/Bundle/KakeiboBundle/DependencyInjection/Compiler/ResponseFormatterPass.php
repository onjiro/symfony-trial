<?php

namespace Onjiro\Bundle\KakeiboBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class ResponseFormatterPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('onjiro_kakeibo.response_formatter_listener')) {
            return;
        }

        $definition = $container->getDefinition('onjiro_kakeibo.response_formatter_listener');
        $taggedServices = $container->findTaggedServiceIds('onjiro_kakeibo.response_formatter');
        foreach ($taggedServices as $id => $tagAttributes) {
            foreach ($tagAttributes as $attributes) {
                $definition->addMethodCall(
                    'addFormatter',
                    array($attributes['format'], new Reference($id))
                );
            }
        }
    }
}
