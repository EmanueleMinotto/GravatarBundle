<?php

namespace EmanueleMinotto\GravatarBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class GravatarExtension extends Extension
{
    /**
     * Loads a specific configuration.
     *
     * @param array            $configs   An array of configuration values.
     * @param ContainerBuilder $container A ContainerBuilder instance.
     *
     * @throws \InvalidArgumentException If tag is not defined.
     *
     * @return void
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $configs = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.xml');

        // if defined override the gravatar.http_client parameter
        // with a defined Guzzle 5 service
        if ($configs['http_client']) {
            $container->getDefinition('gravatar')->setArguments([
                new Reference($configs['http_client']),
            ]);
        }
    }
}
