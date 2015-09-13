<?php

namespace EmanueleMinotto\GravatarBundle\Tests;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    /**
     * Returns an array of bundles to register.
     *
     * @return BundleInterface[] An array of bundle instances.
     */
    public function registerBundles()
    {
        return [
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Symfony\Bundle\TwigBundle\TwigBundle(),
            new \EmanueleMinotto\GravatarBundle\GravatarBundle(),
        ];
    }

    /**
     * Loads the container configuration.
     *
     * @param LoaderInterface $loader A LoaderInterface instance.
     *
     * @return void
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $config = __DIR__.'/Resources/config/config_'.$this->getEnvironment().'.yml';

        if (file_exists($config)) {
            $loader->load($config);

            return;
        }

        $loader->load(__DIR__.'/Resources/config/config.yml');
    }
}
