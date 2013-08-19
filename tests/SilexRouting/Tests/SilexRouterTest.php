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

use Silex\Application as SilexApplication;
use SilexRouting\Application\RoutingTrait;
use SilexRouting\Provider\RoutingServiceProvider;
use SilexRouting\SilexRouter;
use Symfony\Component\Routing\RequestContext;

/**
 * RouterCollection test cases.
 *
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class SilexRouterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return SilexRouter
     */
    protected function getRouter(RequestContext $context)
    {
        $app = new Application();
        $app->register(new RoutingServiceProvider());
        $app->get('/hello', function(){});
        $app->get('/hello2', function(){});
        $app->flush();

        $app['request_context'] = $context;

        return new SilexRouter($app);
    }

    public function testAppContextGetsReturnedFromRouter()
    {
        $context = new RequestContext();
        $router = $this->getRouter($context);

        $this->assertSame($context, $router->getContext());
    }

    public function testSetContextGetsReturnedFromRouter()
    {
        $context = new RequestContext();
        $router = $this->getRouter($context);

        $context2 = new RequestContext();
        $router->setContext($context2);

        $this->assertNotSame($context, $router->getContext());
        $this->assertSame($context2, $router->getContext());
    }

    public function testAllRoutesFromAppAreReturned()
    {
        $context = new RequestContext();
        $router = $this->getRouter($context);

        $this->assertCount(2, $router->getRouteCollection());
    }
}
