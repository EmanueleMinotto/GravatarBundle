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
     * Test application with default HTTP client.
     *
     * @covers ::load
     *
     * @return void
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
     * Test application with custom HTTP client.
     *
     * @covers ::load
     *
     * @return void
     */
    public function testCustomHttpClient()
    {
        $kernel = new AppKernel('GravatarExtensionTest_testCustomHttpClient', true);
        $kernel->boot();

        $container = $kernel->getContainer();

        $gravatar = $container->get('gravatar');
        $httpClient = $container->get('test.http_client');

        $injectedHttpClient = $gravatar->getHttpClient();

        $this->assertSame($httpClient, $injectedHttpClient);
        $this->assertNotEmpty($injectedHttpClient->getBaseUrl());
    }
}
