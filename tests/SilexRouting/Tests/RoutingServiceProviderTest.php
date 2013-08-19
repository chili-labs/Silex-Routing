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
use SilexRouting\SilexRouter;

/**
 * RouterCollection test cases.
 *
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
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

    public function testUrlMatcherReturnsEmptyChainRouterByDefault()
    {
        $app = $this->getApp();
        $this->assertCount(0, $app['url_matcher']->all());
    }

    public function testRoutersReturnsEmptyChainRouterByDefault()
    {
        $app = $this->getApp();
        $this->assertCount(0, $app['routers']->all());
    }
}
