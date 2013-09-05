<?php

/*
 * This file is part of the SilexRouting extension.
 *
 * (c) Project A Ventures GmbH & Co. KG
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SilexRouting\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Cmf\Component\Routing\ChainRouter;

/**
 * SilexRouting provider for advanced routing.
 *
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class RoutingServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['url_matcher'] = $app->share(function () use ($app) {
            /* @var ChainRouter $chainRouter */
            $chainRouter = $app['routers'];
            $chainRouter->setContext($app['request_context']);
            return $chainRouter;
        });

        $app['routers'] = $app->share(function () {
            return new ChainRouter();
        });
    }

    public function boot(Application $app)
    {
    }
}
