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

use SilexRouting\Provider\RoutingServiceProvider;
use SilexRouting\SilexRouter;
use SilexRouting\Tests\TestData\Application;

/**
 * RouterCollection test cases.
 *
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class RoutingTraitTest extends \PHPUnit_Framework_TestCase
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

    public function testTraitAddsRouter()
    {
        if (version_compare(PHP_VERSION, '5.4', 'lt')) {
            $this->markTestSkipped('Skipping; PHP 5.4 or greater is needed');
        }
        $app = $this->getApp();
        $app->addRouter(new SilexRouter($app));
        $this->assertCount(1, $app['routers']->all());
    }

    /**
     * @depends testTraitAddsRouter
     */
    public function testTraitContainsCorrectRouter()
    {
        if (version_compare(PHP_VERSION, '5.4', 'lt')) {
            $this->markTestSkipped('Skipping; PHP 5.4 or greater is needed');
        }
        $app = $this->getApp();
        $router = new SilexRouter($app);

        $app->addRouter($router);
        $arrayOfRouters = $app['routers']->all();
        $this->assertSame($router, $arrayOfRouters[0]);
    }
}
