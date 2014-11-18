<?php

/*
 * This file is part of the SilexRouting extension.
 *
 * (c) Daniel Tschinder
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ProjectA\Silex\Tests\Application;

use ProjectA\Silex\Provider\RoutingServiceProvider;
use ProjectA\Silex\Routing\SilexRouter;
use ProjectA\Silex\Tests\TestData\Application;

/**
 * @author Daniel Tschinder <daniel@tschinder.de>
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

    /**
     * @requires PHP 5.4
     */
    public function testTraitAddsRouter()
    {
        $app = $this->getApp();
        $app->addRouter(new SilexRouter($app));
        $this->assertCount(1, $app['routers']->all());
    }

    /**
     * @depends testTraitAddsRouter
     * @requires PHP 5.4
     */
    public function testTraitContainsCorrectRouter()
    {
        $app = $this->getApp();
        $router = new SilexRouter($app);

        $app->addRouter($router);
        $arrayOfRouters = $app['routers']->all();
        $this->assertSame($router, $arrayOfRouters[0]);
    }
}
