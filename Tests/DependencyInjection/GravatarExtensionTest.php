<?php

namespace EmanueleMinotto\GravatarBundle\Tests\DependencyInjection;

use EmanueleMinotto\GravatarBundle\Tests\AppKernel;
use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass \EmanueleMinotto\GravatarBundle\DependencyInjection\GravatarExtension
 */
class GravatarExtensionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers ::load
     */
    public function testDefaultService()
    {
        $kernel = new AppKernel('GravatarExtensionTest_testDefaultService', true);
        $kernel->boot();

        $container = $kernel->getContainer();

        $this->assertTrue($container->has('gravatar'));
        $this->assertInstanceOf('EmanueleMinotto\Gravatar\Client', $container->get('gravatar'));
    }

    /**
     * @covers ::load
     */
    public function testCustomHttpClient()
    {
        $kernel = new AppKernel('GravatarExtensionTest_testCustomHttpClient', true);
        $kernel->boot();

        $container = $kernel->getContainer();

        $gravatar = $container->get('gravatar');
        $httpClient = $container->get('test.http_client');

        $this->assertSame($httpClient, $gravatar->getHttpClient());
    }
}
