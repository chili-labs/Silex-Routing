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
use SilexRouting\RouterCollection;
use SilexRouting\SilexRouter;

/**
 * RouterCollection test cases.
 *
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class RouterCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testRouterCollectionWithoutRouters()
    {
        $routers = new RouterCollection();
        $this->assertEquals(0, count($routers));
    }

    public function testRouterCollectionWithRouters()
    {
        $routers = new RouterCollection();
        $routers->add(new SilexRouter(new Application()));

        $this->assertEquals(1, count($routers));
    }

    public function testRouterCollectionWithRouterGetPriority()
    {
        $routers = new RouterCollection();
        $router = new SilexRouter(new Application());
        $routers->add($router, 255);

        $this->assertEquals(255, $routers->getPriority($router));
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testRouterCollectionWithoutRouterGetPriority()
    {
        $routers = new RouterCollection();
        $routers->getPriority(new SilexRouter(new Application));
    }

    public function testCloningRouterCollection()
    {
        $routers = new RouterCollection();
        $routers->add(new SilexRouter(new Application()));

        $clone = clone $routers;

        $cloneArray = $clone->all();
        $routerArray = $routers->all();

        $this->assertNotSame($cloneArray[0], $routerArray[0]);
    }
}
