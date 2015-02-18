<?php

namespace EmanueleMinotto\GravatarBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This class validates and merges configuration from your app files.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder.
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('gravatar');

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('http_client')
                    ->defaultNull()
                    ->info('Guzzle 5 Client service ID')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}