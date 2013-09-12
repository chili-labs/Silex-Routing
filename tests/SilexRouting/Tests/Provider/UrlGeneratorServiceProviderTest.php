<?php

/*
 * This file is part of the SilexRouting extension.
 *
 * (c) Project A Ventures GmbH & Co. KG
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SilexRouting\Tests;

use Silex\Application;
use SilexRouting\Provider\RoutingServiceProvider;
use SilexRouting\Provider\UrlGeneratorServiceProvider;

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class UrlGeneratorProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return Application
     */
    protected function getApp()
    {
        $app = new Application();
        $app->register(new RoutingServiceProvider());
        $app->register(new UrlGeneratorServiceProvider());

        return $app;
    }

    public function testUrlGeneratorReturnsChainRouter()
    {
        $app = $this->getApp();
        $this->assertInstanceOf('Symfony\Cmf\Component\Routing\ChainRouter', $app['url_generator']);
    }

    /**
     * @depends testUrlGeneratorReturnsChainRouter
     */
    public function testUrlGeneratorReturnsEmptyChainRouterByDefault()
    {
        $app = $this->getApp();
        $this->assertCount(0, $app['url_generator']->all());
    }
}
