<?php

/*
 * This file is part of the SilexRouting extension.
 *
 * (c) Daniel Tschinder
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ProjectA\Silex\Tests\Routing;

use ProjectA\Silex\Provider\RoutingServiceProvider;
use ProjectA\Silex\Routing\SilexRouter;
use Silex\Application;
use Symfony\Component\Routing\RequestContext;

/**
 * @author Daniel Tschinder <daniel@tschinder.de>
 */
class SilexRouterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param  RequestContext $context
     * @return SilexRouter
     */
    protected function getRouter(RequestContext $context)
    {
        $app = new Application();
        $app->register(new RoutingServiceProvider());
        $app->get('/hello', 'test')->bind('hello1');
        $app->get('/hello2', 'test')->bind('hello2');
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

    public function testUrlGenerationReturnsCorrectUrl()
    {
        $context = new RequestContext();
        $router = $this->getRouter($context);

        $this->assertEquals('/hello', $router->generate('hello1'));
    }

    public function testUrlMatchingMatches()
    {
        $context = new RequestContext();
        $router = $this->getRouter($context);

        $expected = array(
            '_controller' => 'test',
            '_route' => 'hello1'
        );

        $this->assertEquals($expected, $router->match('/hello'));
    }
}
