<?php

/*
 * This file is part of the SilexRouting extension.
 *
 * (c) Daniel Tschinder
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ChiliLabs\Silex\Tests\Provider;

use ChiliLabs\Silex\Provider\RoutingServiceProvider;
use Silex\Application;

/**
 * @author Daniel Tschinder <daniel@tschinder.de>
 */
class RoutingServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return Application
     */
    protected function getApp()
    {
        $app = new Application();
        $app->register(new RoutingServiceProvider());

        return $app;
    }

    public function testUrlMatcherReturnsChainRouter()
    {
        $app = $this->getApp();
        $this->assertInstanceOf('Symfony\Cmf\Component\Routing\ChainRouter', $app['url_matcher']);
    }

    public function testRoutersReturnsChainRouter()
    {
        $app = $this->getApp();
        $this->assertInstanceOf('Symfony\Cmf\Component\Routing\ChainRouter', $app['routers']);
    }

    /**
     * @depends testUrlMatcherReturnsChainRouter
     */
    public function testUrlMatcherReturnsEmptyChainRouterByDefault()
    {
        $app = $this->getApp();
        $this->assertCount(0, $app['url_matcher']->all());
    }

    /**
     * @depends testRoutersReturnsChainRouter
     */
    public function testRoutersReturnsEmptyChainRouterByDefault()
    {
        $app = $this->getApp();
        $this->assertCount(0, $app['routers']->all());
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
